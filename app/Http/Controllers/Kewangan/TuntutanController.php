<?php

namespace App\Http\Controllers\Kewangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Mail;

use App\Tuntutan;
use App\Entiti;
use App\Mail\TuntutanBaru;

class TuntutanController extends Controller
{
    public function __construct()
    {
        // Tetapan lokasi folder resources/views/admin/tuntutan
        $this->theme = 'kewangan.tuntutan';
    }

    public function datatables(Request $request)
    {
        // Query ke table tuntutan
        // Check filter custom based on Entiti
        if ($request->has('entiti') && !is_null($request->input('entiti')))
        {
            $query = Tuntutan::with('individu')
            ->where('entiti_id', '=', $request->input('entiti'))
            ->select([
                'tblertuntutan.*'
            ]);
        }
        else
        {
            $query = Tuntutan::with('individu')
            ->select([
                'tblertuntutan.*'
            ]);
            
        }

        // Return response ajax datatables
        return DataTables::of($query)
        ->addColumn('entiti', function ($tuntutan) {
            return $tuntutan->entiti->entitinama ?? "";
        })
        ->addColumn('status', function ($tuntutan) {
            return $tuntutan->statusAkhir->refStatus->status ?? "";
        })
        ->addColumn('action', function ($tuntutan) {
            return view($this->theme . '.actions', compact('tuntutan'));
        })
        ->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_entiti = Entiti::whereIn('entitikod', ['02', '03', '04'])
        ->select('entitinama', 'id')
        ->get();

        return view($this->theme . '.index', compact('senarai_entiti'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuntutan $tuntutan)
    {

        // Semak jenis submission (simpan = draf / hantar = baru)
        if ($request->has('hantar'))
        {
            // Validate data dari borang
            $request->validate([
                'ertuntutantarikhrawat' => 'required',
                'ertuntutannoresit' => 'required',
                'ertuntutanamaun' => 'required|numeric',
                'fileresit' => 'required|mimes:docx,pdf,jpg,png',
                'filedokumen' => 'required|mimes:docx,pdf,jpg,png'
            ]);
        }

        // Dapatkan semua data dari borang
        $data = $request->all();
        $data['idpenggunakemaskini'] = Auth::user()->id;
        $data['tkhmasakmskini'] = Carbon::now();

        // Kemaskini data kepada table tuntutan
        $tuntutan->update($data);

        // Sediakan data untuk table tblertuntutanstatus
        if ( $tuntutan->status()->count() > 0 )
        {
            $statusNo = ++$tuntutan->status()
            ->orderBy('id', 'desc')
            ->first()
            ->ertuntutanstatusno;
        }
        else
        {
            $statusNo = 1;
        }
        
        $dataStatus['ertuntutanstatusno'] = $statusNo;
        $dataStatus['statustuntutan_id'] = $request->has('hantar') ?  24 : 23;
        $dataStatus['ertuntutanstatustarikh'] = Carbon::now();
        $dataStatus['employeeno'] = $tuntutan->employeeno;
        $dataStatus['idpenggunamasuk'] = Auth::user()->id;
        $dataStatus['tkhmasamasuk'] = Carbon::now();
        $dataStatus['tkhmasakmskini'] = Carbon::now();

        // Simpan dataStatus kepada table tblertuntutanstatus
        $tuntutan->status()->create($dataStatus);

        if ($request->has('hantar'))
        {
            Mail::to('system@erawatan.test')->send(new TuntutanBaru($tuntutan));
        }

        // Bagi respon akhir
        return redirect()->route('kewangan.tuntutan.index');
    }
}

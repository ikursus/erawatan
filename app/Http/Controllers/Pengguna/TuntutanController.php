<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Tuntutan;
use App\Entiti;

class TuntutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dapatkan rekod tuntutan
        $senarai_tuntutan = Tuntutan::all();

        // dd($senarai_tuntutan);

        return view('tuntutan.index', compact('senarai_tuntutan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Dapatkan rekod user yang sedang login
        $pengguna = Auth::user();

        $pesakit = $pengguna->profile
        ->individu()
        ->select('individunama', 'id')
        ->get();

        $klinik = Entiti::whereIn('entitikod', ['02','03', '04'])
        ->select('id', 'entitinama')
        ->get();

        // Paparkan borang tuntutan
        // return $pengguna->profile->entityname;
        return view('tuntutan.borang', compact('pengguna', 'pesakit', 'klinik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $data['employeeno'] = Auth::user()->profile->employeeno;
        $data['idpenggunamasuk'] = Auth::user()->id;
        $data['tkhmasamasuk'] = Carbon::now();
        $data['tkhmasakmskini'] = Carbon::now();

        // Simpan data kepada table tuntutan
        $tuntutan = Tuntutan::create($data);

        // Bagi respon akhir
        return redirect()->route('tuntutan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuntutan $tuntutan)
    {
        $pengguna = Auth::user();
        // $pengguna = auth()->user();

        return view('tuntutan.edit', compact('tuntutan', 'pengguna'));
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

        // Bagi respon akhir
        return redirect()->route('tuntutan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuntutan $tuntutan)
    {
        $tuntutan->delete();

        // return redirect()->route('tuntutan.index');
        return redirect()->back();
    }

    public function datatables()
    {

    }
}

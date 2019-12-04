@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">

<div class="col-12">

<div class="card">


<div class="card-header">
    Senarai Tuntutan
</div>

<div class="card-body">

<p>
    <a href="{{ route('tuntutan.create') }}" class="btn btn-primary">TUNTUTAN BARU</a>
</p>

<table class="table table-hover table-bordered">
<thead class="thead-light">
    <tr>
        <th>
        #
        </th>
        <th>
            TARIKH RAWATAN
        </th>
        <th>
            NAMA PESAKIT
        </th>
        <th>
            NAMA KLINIK
        </th>
        <th>
            AMAUN
        </th>
        <th>
            STATUS BAYARAN
        </th>
        <th>
            TINDAKAN
        </th>
    </tr>
</tead>
<tbody>

    @foreach ($senarai_tuntutan as $tuntutan)
    <tr>
        <td>{{ $tuntutan->id ?? "" }}</td>
        <td>{{ $tuntutan->ertuntutantarikhrawat ?? "" }}</td>
        <td>{{ $tuntutan->individu_id ?? "" }}</td>
        <td>{{ $tuntutan->klinik_id ?? "" }}</td>
        <td>{{ $tuntutan->ertuntutanamaun ?? "" }}</td>
        <td></td>
        <td>
            <a href="{{ route('tuntutan.edit', $tuntutan->id) }}" class="btn btn-sm btn-info">EDIT</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $tuntutan->id }}">
             DELETE
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal-delete-{{ $tuntutan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                
                <form method="POST" action="{{ route('tuntutan.destroy', $tuntutan->id) }}">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengesahan Hapus Rekod</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>AWAS!</strong>. Adakah anda bersetuju untuk menghapuskan rekod ID: {{ $tuntutan->id }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Teruskan</button>
                </div>
                </div>

                </form>

            </div>
            </div>

        </td>
    </tr>
    @endforeach

</tbody>
</table>

</div>

<div class="card-footer">

</div>

</div>


</div>

</div>

</div>
@endsection
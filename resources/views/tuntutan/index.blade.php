@extends('layouts.app')

@section('head')
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

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

<table class="table table-hover table-bordered" id="tuntutan-datatables">
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
</table>

</div>

<div class="card-footer">

</div>

</div>


</div>

</div>

</div>
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#tuntutan-datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('tuntutan.datatables') }}",
        columns: [
            { data: 'id', name: 'tblertuntutan.id' },
            { data: 'ertuntutantarikhrawat', name: 'tblertuntutan.ertuntutantarikhrawat' },
            { data: 'individu', name: 'individu' },
            { data: 'entiti', name: 'entiti' },
            { data: 'ertuntutanamaun', name: 'tblertuntutan.ertuntutanamaun' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection
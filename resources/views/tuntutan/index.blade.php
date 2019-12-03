@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">

<div class="col-12">

<div class="card">


<div class="card-header">

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
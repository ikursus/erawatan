@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-12">

            <div class="card">


                <div class="card-header">
                    <h3 class="card-title">Tuntutan {{ $pengguna->penggunanama }}</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group row">
                                <label for="penggunanama" class="col-sm-3 col-form-label">Nama Kakitangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $pengguna->penggunanama }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bahagian" class="col-sm-3 col-form-label">Bahagian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $pengguna->profile->entityname }}">
                                </div>
                            </div>

                        </div><!--/.col-md-8-->
                        <div class="col-md-4">

                        </div><!--/.col-md-4-->
                    </div><!--/.row-->

                </div>

                <div class="card-footer">

                    <a href="{{ route('tuntutan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                </div>

            </div><!--/.card-->


        </div><!--/.col-12-->

    </div><!--/.row-->

</div><!--/.container-->
@endsection
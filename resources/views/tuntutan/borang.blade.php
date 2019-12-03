@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-12">

            <div class="card">


                <div class="card-header">
                    <p class="card-title">Tuntutan {{ $pengguna->penggunanama }}</p>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group row">
                                <label for="penggunanama" class="col-sm-3 col-form-label">Nama Kakitangan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $pengguna->penggunanama }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bahagian" class="col-sm-3 col-form-label">Bahagian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $pengguna->profile->entityname }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ertuntutantarikhrawat" class="col-sm-3 col-form-label">Tarikh Rawatan</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="ertuntutantarikhrawat" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="individu_id" class="col-sm-3 col-form-label">Pesakit</label>
                                <div class="col-sm-9">
                                    <select name="individu_id" class="form-control">
                                        <option value="">-- Sila Pilih --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="entiti_id" class="col-sm-3 col-form-label">Klinik</label>
                                <div class="col-sm-9">
                                    <select name="entiti_id" class="form-control">
                                        <option value="">-- Sila Pilih --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="individu_id" class="col-sm-3 col-form-label">Alamat Penuh Klinik</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="baki" class="col-sm-3 col-form-label">Baki Yang Boleh Dituntut (RM)</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" step="1" class="form-control" name="ertuntutanamaun" value="200.00">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ertuntutannoresit" class="col-sm-3 col-form-label">No. Resit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ertuntutannoresit" value="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ertuntutanamaun" class="col-sm-3 col-form-label">Amaun</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" step="1" class="form-control" name="ertuntutanamaun" value="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="fileresit" class="col-sm-3 col-form-label">Muat Naik Resit</label>
                                <div class="col-sm-9">
                                    <input type="file" name="fileresit" value="">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="filedokumen" class="col-sm-3 col-form-label">Muat Naik Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="file" name="filedokumen" value="">
                                </div>
                            </div>

                        </div><!--/.col-md-8-->
                        <div class="col-md-4">
                            <img src="{{ asset('images/placeholderuser.png') }}" class="img-fluid">
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
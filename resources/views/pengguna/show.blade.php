@extends('layouts.main')

@section('title', 'Detail pengguna')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Detail pengguna</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('pengguna.index')}}">Data pengguna</a></li>
        <li class="breadcrumb-item active">Detail Data pengguna</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Detail Data Pengguna</h3>
            </div>
            <br>

            <div class="card-body">
                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-4">

                        <div class="form-group">
                            @if ($pengguna->gambar)
                            <img id="preview" class="product" width="300" height="300" src="{{ asset('storage/images/pengguna/'.$pengguna->gambar) }}"/>
                            @elseif($pengguna->gambar == null)
                            <img id="preview" class="product" width="300" height="300" src="{{ asset('images/pengguna/default.png') }}"/>
                            @endif
                        </div>

                    </div>


                    <!-- Kolom Tengah -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Pengguna:</label>
                            <div>
                                <p>{{$pengguna->name}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Username:</label>
                            <div>
                                <p>{{$pengguna->username}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <div>
                                <p>{{$pengguna->email}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Role:</label>
                            <div>
                                <p>{{$pengguna->role}}</p>
                            </div>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Dibuat pada:</label>
                            <div>
                                <p>{{date('d M Y', strtotime($pengguna->created_at))}}</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('pengguna.tampil_ubah', ['id' => $pengguna->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                <a href="{{route('pengguna.index')}}" class="btn btn-default float-right"> Kembali</a>
            </div>

        </div>

    </div>
</div>
@endsection

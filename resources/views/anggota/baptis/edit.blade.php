@extends('layouts.main')

@section('title', 'Baptis')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Baptis</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('baptis.index') }}">Data Baptis</a></li>
            <li class="breadcrumb-item active">Ubah Data Baptis</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Data Baptis {{ $baptis->anggota->nama }}</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('baptis.simpan_perbarui', ['id' => $baptis->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="card-body">
                        <input type="hidden" required="required" name="id_anggota" value="{{ $baptis->id_anggota }}"
                            readonly>

                        <div class="form-group">
                            <label for="tempat_baptis">Tempat Baptis <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control @error('tempat_baptis') is-invalid @enderror" name="tempat_baptis"
                                id="tempat_baptis" placeholder="Masukkan Tempat Baptis"
                                value="{{ old('tempat_baptis', $baptis->tempat_baptis) }}">
                            @error('tempat_baptis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Baptis <b style="color:Tomato;">*</b></label>
                            <input type="date" name="tgl_baptis" id="tgl_baptis"
                                class="form-control @error('tgl_baptis') is-invalid @enderror"
                                value="{{ old('tgl_baptis', $baptis->tgl_baptis) }}">
                            @error('tgl_baptis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pendeta">Pendeta <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control @error('pendeta') is-invalid @enderror" name="pendeta"
                                id="pendeta" placeholder="Masukkan Nama Pendeta"
                                value="{{ old('pendeta', $baptis->pendeta) }}">
                            @error('pendeta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('baptis.tampil_detail', ['id' => $baptis->id]) }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection

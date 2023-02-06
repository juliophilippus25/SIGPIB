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
            <li class="breadcrumb-item active">Tambah Data Baptis</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Tambah Data Baptis</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('baptis.simpan') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label>Anggota Jemaat <b style="color:Tomato;">*</b></label>
                            <select class="form-control select2bs4 @error('id_anggota') is-invalid @enderror"
                                name="id_anggota" style="width: 100%;">
                                <option hidden disabled selected value>Pilih Anggota Jemaat</option>
                                @foreach ($anggota as $data)
                                    @if ($data->srt_baptis == null)
                                        <option value="{{ $data->id }}"
                                            {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota }}
                                            - {{ $data->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_anggota')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tempat_baptis">Tempat Baptis <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control @error('tempat_baptis') is-invalid @enderror" name="tempat_baptis"
                                id="tempat_baptis" placeholder="Masukkan Tempat Baptis"
                                value="{{ old('tempat_baptis') }}">
                            @error('tempat_baptis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Baptis <b style="color:Tomato;">*</b></label>
                            <input type="date" name="tgl_baptis" id="tgl_baptis"
                                class="form-control @error('tgl_baptis') is-invalid @enderror"
                                value="{{ old('tgl_baptis') }}">
                            @error('tgl_baptis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pendeta">Pendeta <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control @error('pendeta') is-invalid @enderror" name="pendeta"
                                id="pendeta" placeholder="Masukkan Nama Pendeta"
                                value="{{ old('pendeta') }}">
                            @error('pendeta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('baptis.index') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection

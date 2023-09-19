@extends('layouts.main')

@section('title', 'Sidi')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Sidi</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sidi.index') }}">Data Jemaat Sidi</a></li>
            <li class="breadcrumb-item active">Ubah Data Sidi</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Data Sidi {{ $sidi->anggota->nama }}</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('sidi.simpan_perbarui', ['id' => $sidi->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="card-body">
                        <input type="hidden" required="required" name="id_anggota" value="{{ $sidi->id_anggota }}"
                            readonly>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="tempat_sidi">Tempat sidi <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('tempat_sidi') is-invalid @enderror"
                                    name="tempat_sidi" id="tempat_sidi" placeholder="Masukkan Tempat sidi"
                                    value="{{ old('tempat_sidi', $sidi->tempat_sidi) }}">
                                @error('tempat_sidi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label>Tanggal sidi <b style="color:Tomato;">*</b></label>
                                <input type="date" name="tgl_sidi" id="tgl_sidi"
                                    class="form-control @error('tgl_sidi') is-invalid @enderror"
                                    value="{{ old('tgl_sidi', $sidi->tgl_sidi) }}">
                                @error('tgl_sidi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pendeta">Pendeta <b style="color:Tomato;">*</b></label>
                            <input type="text" class="form-control @error('pendeta') is-invalid @enderror" name="pendeta"
                                id="pendeta" placeholder="Masukkan Nama Pendeta"
                                value="{{ old('pendeta', $sidi->pendeta) }}">
                            @error('pendeta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('sidi.tampil_detail', ['id' => $sidi->id]) }}"
                            class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection

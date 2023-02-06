@extends('layouts.main')

@section('title', 'Baptis')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Detail Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('baptis.index') }}">Data Jemaat Baptis</a></li>
            <li class="breadcrumb-item active">Detail Data Jemaat Baptis</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-lg-4">

                            <div class="form-group text-center">
                                @if ($baptis->anggota->gambar == null)
                                    <img id="preview" style="border-radius: 25px; padding: 20px;" width="200"
                                        height="200" src="{{ asset('images/pengguna/default.png') }}" />
                                @else
                                    <img id="preview" style="border-radius: 25px; padding: 20px;" width="300"
                                        height="300" src="{{ asset('storage/images/anggota/' . $anggota->gambar) }}" />
                                @endif
                            </div>

                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-lg-8">
                            <table class="table table-borderless table-striped">

                                <tbody>
                                    <tr>
                                        <td style="width: 30%">Kode Anggota</td>
                                        <td>:</td>
                                        <td style="width: 70%">{{ $baptis->anggota->kode_anggota }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td>{{ $baptis->anggota->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $baptis->anggota->jk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{{ $baptis->anggota->tempat_lahir }} /
                                            {{ Carbon\Carbon::parse($baptis->anggota->tgl_lahir)->isoFormat('D MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Baptis</td>
                                        <td>:</td>
                                        <td>{{ $baptis->tempat_baptis }} /
                                            {{ Carbon\Carbon::parse($baptis->tgl_baptis)->isoFormat('D MMMM Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pendeta</td>
                                        <td>:</td>
                                        <td>{{ $baptis->pendeta }}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <a href="{{ route('baptis.tampil_ubah', ['id' => $baptis->id]) }}" class="btn btn-warning"><i
                            class="fa fa-edit"></i> Ubah</a>
                    <a target="_blank" href="#"
                        class="btn btn-success"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
                    <a href="{{ route('baptis.index') }}" class="btn btn-default float-right"> Kembali</a>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    @endsection

@extends('layouts.main')

@section('title', 'Detail Anggota')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Detail Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Data Anggota</a></li>
            <li class="breadcrumb-item active">Detail Data Anggota</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Detail <b>{{ $anggota->kode_anggota }}</b></h3>
                </div>
                <br>

                <div class="card-body">
                    <div class="row">

                        <!-- Kolom Kiri -->
                        <div class="col-md-4">

                            <div class="form-group">
                                @if ($anggota->gambar == null)
                                    <img id="preview" class="product ml-3" style="border-radius: 25px; padding: 20px;" width="200" height="200"
                                        src="{{ asset('images/pengguna/default.png') }}" />
                                @else
                                    <img id="preview" class="product ml-3" style="border-radius: 25px; padding: 20px;" width="300" height="300"
                                        src="{{ asset('storage/images/anggota/' . $anggota->gambar) }}" />
                                @endif
                            </div>

                            <table class="table table-borderless table-striped">

                                <thead>
                                    <th><i class="fa fa-file"></i>&nbsp;DATA BERKAS</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="width: 100%">
                                            @if ($anggota->srt_baptis != null)
                                                <a class="drobdown-item" target="_blank" href="{{ asset('storage/dokumen/baptis/' . $anggota->srt_baptis) }}">SURAT BAPTIS <i class="fa fa-circle-check"></i></a>
                                            @else
                                                <p>SURAT BAPTIS <i class="fa fa-circle-xmark"></i></p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%">
                                            @if ($anggota->srt_sidi != null)
                                                <a class="drobdown-item" target="_blank" href="{{ asset('storage/dokumen/sidi/' . $anggota->srt_sidi) }}">SURAT SIDI <i class="fa fa-circle-check"></i></a>
                                            @else
                                                <p>SURAT SIDI <i class="fa fa-circle-xmark"></i></p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>


                        <!-- Kolom Kanan -->
                        <div class="col-md-8">
                            <table class="table table-borderless table-striped">

                                <thead>
                                    <th><i class="fa fa-user"></i>&nbsp;DATA PRIBADI</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="width: 25%">Nama Lengkap</td>
                                        <td>:</td>
                                        <td style="width: 70%">{{ $anggota->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $anggota->jk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{{ $anggota->tempat_lahir }} / {{ date('d-m-Y', strtotime($anggota->tgl_lahir)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td>{{ $anggota->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>:</td>
                                        <td>{{ $anggota->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $anggota->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td>{{ $anggota->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kota/Kabupaten</td>
                                        <td>:</td>
                                        <td>{{ $anggota->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{ $anggota->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan/Desa</td>
                                        <td>:</td>
                                        <td>{{ $anggota->kelurahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td>{{ $anggota->goldar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kepala Keluarga</td>
                                        <td>:</td>
                                        <td>{{ $anggota->sts_keluarga }}</td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('anggota.tampil_ubah', ['id' => $anggota->id]) }}" class="btn btn-primary"><i
                            class="fa fa-edit"></i> Edit</a>
                    <a target="_blank" href="{{ route('anggota.download_satu', ['id' => $anggota->id]) }}"
                        class="btn btn-success"><i class="fas fa-cloud-download-alt"></i> PDF</a>
                    <a href="{{ route('anggota.index') }}" class="btn btn-default float-right"> Kembali</a>
                </div>

            </div>

        </div>
    </div>
@endsection

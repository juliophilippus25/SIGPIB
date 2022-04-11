@extends('layouts.main')

@section('title', 'Detail Anggota')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Detail Anggota</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Data Anggota</a></li>
        <li class="breadcrumb-item active">Detail Data Anggota</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card card-dark">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Data Anggota</strong></h3>
            </div>
            <br>

            <div class="card-body">
                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <img id="preview" class="product" width="300" height="300" src="{{ asset('images/anggota/'.$anggota->gambar) }}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Lengkap:</label>
                            <div>
                                <p>{{$anggota->nama}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kepala Keluarga:</label>
                            <div>
                                <p>{{$anggota->sts_keluarga}}</p>
                            </div>
                        </div>

                    </div>


                    <!-- Kolom Tengah -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin:</label>
                            <div>
                                <p>{{$anggota->jk}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Tempat Lahir:</label>
                            <div>
                                <p>{{$anggota->tempat_lahir}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir:</label>
                            <div>
                                <p>{{date('d M Y', strtotime($anggota->tgl_lahir))}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor Handphone:</label>
                            <div>
                                <p>{{$anggota->no_hp}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Pekerjaan:</label>
                            <div>
                                <p>{{$anggota->pekerjaan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Golongan Darah:</label>
                            <div>
                                <p>{{$anggota->goldar}}</p>
                            </div>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Provinsi:</label>
                            <div>
                                <p>{{$anggota->provinsi}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kabupaten:</label>
                            <div>
                                <p>{{$anggota->kabupaten}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kecamatan:</label>
                            <div>
                                <p>{{$anggota->kecamatan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kelurahan:</label>
                            <div>
                                <p>{{$anggota->kelurahan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat:</label>
                            <div>
                                <p>{{$anggota->alamat}}</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('anggota.tampil_ubah', ['id' => $anggota->id]) }}" class="btn btn-dark"> Edit</a>
                <a href="{{route('anggota.index')}}" class="btn btn-default float-right"> Kembali</a>
            </div>

        </div>

    </div>
</div>
@endsection

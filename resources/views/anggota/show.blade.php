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
                            <input type="file" name="gambar" class="file" accept="image/*" hidden>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Nama Lengkap:</label>
                            <div>
                                <p>{{$anggota->nama}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Kepala Keluarga:</label>
                            <div>
                                <p>{{$anggota->sts_keluarga}}</p>
                            </div>
                        </div>

                    </div>


                    <!-- Kolom Tengah -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label" for="email">Jenis Kelamin:</label>
                            <div>
                                <p>{{$anggota->jk}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Tempat Lahir:</label>
                            <div>
                                <p>{{$anggota->tempat_lahir}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Tanggal Lahir:</label>
                            <div>
                                <p>{{$anggota->tgl_lahir}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Nomor Handphone:</label>
                            <div>
                                <p>{{$anggota->no_hp}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Pekerjaan:</label>
                            <div>
                                <p>{{$anggota->pekerjaan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Golongan Darah:</label>
                            <div>
                                <p>{{$anggota->goldar}}</p>
                            </div>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label" for="email">Provinsi:</label>
                            <div>
                                @foreach ($provinsi as $data )
                                    <p>{{$data->name}}</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Kabupaten:</label>
                            <div>
                                @foreach ($kabupaten as $data )
                                    <p>{{$data->name}}</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Kecamatan:</label>
                            <div>
                                <p>{{$anggota->kecamatan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Kelurahan:</label>
                            <div>
                                <p>{{$anggota->kelurahan}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">Alamat:</label>
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
                <a href="{{route('anggota.index')}}" class="btn btn-default">Kembali</a>
            </div>

        </div>

    </div>
</div>
@endsection

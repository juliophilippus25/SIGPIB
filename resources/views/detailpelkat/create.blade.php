@extends('layouts.main')

@section('title', 'Pelayanan Kategorial')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
</div><!-- /.col -->

<div class="col-sm-12">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('pelkat.index')}}">Data Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detailpelkat.index', ['id' => $pelkat->id]) }}">Detail Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item active">Tambah Anggota Pelayanan Kategorial</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-8">

        <div class="card card-dark">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Tambah Data Anggota {{ $pelkat->nama_pelkat }}</strong></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="{{route('detailpelkat.simpan')}}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Anggota PelKat <b style="color:Tomato;">*</b></label>
                        <input type="hidden" required="required" name="id_pelkat" value="{{ $pelkat->id }}" readonly>
                        <select class="form-control select2bs4 @error('id_anggota') is-invalid @enderror" name="id_anggota" style="width: 100%;">
                            <option hidden disabled selected value>Pilih Anggota PelKat</option>
                            @foreach($anggota as $data)
                            <option value="{{ $data->id }}">{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                            @endforeach
                        </select>
                        @error('id_anggota')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jabatan Pengurus PelKat <b style="color:Tomato;">*</b></label>
                        <select class="form-control select2bs4 @error('pengurus') is-invalid @enderror" name="pengurus" style="width: 100%;">
                            <option hidden disabled selected value>Pilih Jabatan Pengurus PelKat</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Sekretaris 1">Sekretaris 1</option>
                            <option value="Sekretaris 2">Sekretaris 2</option>
                            <option value="Bendahara 1">Bendahara 1</option>
                            <option value="Bendahara 2">Bendahara 2</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                        @error('pengurus')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                    <a href="{{ route('detailpelkat.index', ['id' => $pelkat->id]) }}" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

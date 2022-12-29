@extends('layouts.main')

@section('title', 'Pelayanan Kategorial')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
</div><!-- /.col -->

<div class="col-sm-12">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('pelkat.index')}}">Data Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item"><a href="{{ route('detailpelkat.index', ['id' => $pelkat->id]) }}">Detail Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item active">Tambah Anggota Pelayanan Kategorial</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-8">

        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Form Tambah Data Pengurus {{ $pelkat->nama_pelkat }}</h3>
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
                                @if ($pelkat->nama_pelkat == 'Pelayanan Anak')
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                    @elseif ($pelkat->nama_pelkat == 'Persekutuan Teruna')
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                    @elseif ($pelkat->nama_pelkat == 'Gerakan Pemuda' )
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                    @elseif ($pelkat->nama_pelkat == 'Persekutuan Kaum Perempuan' AND $data->jk == 'Perempuan')
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                    @elseif ($pelkat->nama_pelkat == 'Persekutuan Kaum Bapak' AND $data->jk == 'Laki-laki' )
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                    @elseif ($pelkat->nama_pelkat == 'Persekutuan Kaum Lanjut Usia' )
                                    <option value="{{ $data->id }}" {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                                @endif
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
                            <option value="Ketua" @if (old('pengurus') == "Ketua") {{ 'selected' }} @endif>Ketua</option>
                            <option value="Wakil Ketua" @if (old('pengurus') == "Wakil Ketua") {{ 'selected' }} @endif>Wakil Ketua</option>
                            <option value="Sekretaris 1" @if (old('pengurus') == "Sekretaris 1") {{ 'selected' }} @endif>Sekretaris 1</option>
                            <option value="Sekretaris 2" @if (old('pengurus') == "Sekretaris 2") {{ 'selected' }} @endif>Sekretaris 2</option>
                            <option value="Bendahara 1" @if (old('pengurus') == "Bendahara 1") {{ 'selected' }} @endif>Bendahara 1</option>
                            <option value="Bendahara 2" @if (old('pengurus') == "Bendahara 2") {{ 'selected' }} @endif>Bendahara 2</option>
                            <option value="Anggota" @if (old('pengurus') == "Anggota") {{ 'selected' }} @endif>Anggota</option>
                        </select>
                        @error('pengurus')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('detailpelkat.index', ['id' => $pelkat->id]) }}" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

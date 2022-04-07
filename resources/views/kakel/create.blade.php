@extends('layouts.main')

@section('title', 'Kartu Keluarga')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('kakel.index')}}">Data Kartu Keluarga</a></li>
      <li class="breadcrumb-item active">Tambah Data Kartu Keluarga</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Tambah Data Kartu Keluarga</strong></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('kakel.simpan')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                  <label>Kepala Keluarga <b style="color:Tomato;">*</b></label>
                  <select class="form-control select2bs4 @error('id_anggota') is-invalid @enderror" name="id_anggota" style="width: 100%;">
                  <option hidden disabled selected value>Pilih Kepala Keluarga</option>
                    @foreach($anggota as $data)
                      @if($data->sts_keluarga == 'Ya')
                        <option value="{{ $data->id }}">{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                      @endif
                    @endforeach
                  </select>
                    @error('id_anggota')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label>Sektor Wilayah <b style="color:Tomato;">*</b></label>
                  <select class="form-control select2bs4 @error('id_sekwil') is-invalid @enderror" name="id_sekwil" style="width: 100%;">
                  <option hidden disabled selected value>Pilih Sektor Wilayah</option>
                    @foreach($sekwil as $data)
                      <option value="{{ $data->id }}">{{ $data->nama_sekwil}}</option>
                    @endforeach
                  </select>
                    @error('id_sekwil')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="nomor_kk">Nomor Kartu Keluarga <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk" placeholder="Masukkan Nomor Kartu Keluarga">
                    @error('nomor_kk')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Simpan</button>
                  <a href="{{route('kakel.index')}}" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

@endsection

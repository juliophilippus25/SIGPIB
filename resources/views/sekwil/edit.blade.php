@extends('layouts.main')

@section('title', 'Sektor Wilayah')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Sektor Wilayah</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('sekwil.index')}}">Data Sektor Wilayah</a></li>
      <li class="breadcrumb-item active">Ubah Data Sektor Wilayah</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-default">
              <div class="card-header d-flex">
                <h3 class="card-title">Form Ubah Sektor Wilayah {{ $sekwil->nama_sekwil }}</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('sekwil.simpan_perbarui', ['id' => $sekwil->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="card-body">


                  <div class="form-group">
                    <label for="nama_sekwil">Nama Sektor Wilayah <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('nama_sekwil') is-invalid @enderror" name="nama_sekwil" id="nama_sekwil" value="{{ old('nama_sekwil', $sekwil->nama_sekwil) }}" placeholder="Masukkan Nama Sektor Wilayah">
                    @error('nama_sekwil')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{route('sekwil.index')}}" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

@endsection

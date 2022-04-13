@extends('layouts.main')

@section('title', 'Pelayanan Kategorial')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('pelkat.index')}}">Data Pelayanan Kategorial</a></li>
      <li class="breadcrumb-item active">Ubah Data Pelayanan Kategorial</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Ubah Pelayanan Kategorial {{ $pelkat->nama_pelkat }}</strong></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('pelkat.simpan_perbarui', ['id' => $pelkat->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="card-body">

                  <div class="form-group">
                    <label for="nama_pelkat">Nama Pelayanan Kategorial <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('nama_pelkat') is-invalid @enderror" name="nama_pelkat" id="nama_pelkat" value="{{ old('nama_pelkat', $pelkat->nama_pelkat) }}" placeholder="Masukkan Nama Pelayanan Kategorial">
                    @error('nama_pelkat')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Simpan</button>
                  <a href="{{route('pelkat.index')}}" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

@endsection

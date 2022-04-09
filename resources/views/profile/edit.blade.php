@extends('layouts.main')

@section('title', 'Profile')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Profile</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Ubah Profile</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row">

  <div class="col-md-12">

        <div class="card card-dark">
          <div class="card-header d-flex justify-content-center">
            <h3 class="card-title"><strong>Form Ubah Profile</strong></h3>
          </div>

          <form action="{{ route('profile.simpan_perbarui') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('put') }}
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

            <!-- Kolom Kiri -->
              <div class="col-md-6">

              <div class="form-group">
                    <label for="name">Nama Pengguna <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $profile->name }}" placeholder="Masukkan Nama Pengguna">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email <b style="color:Tomato;">*</b></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $profile->email }}" autocomplete="email" autofocus placeholder="Masukkan Email">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="username">Username <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ $profile->username }}" autocomplete="username" autofocus placeholder="Masukkan Username">
                    @error('username')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">Password <b style="color:Tomato;">*</b></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="password" autofocus placeholder="Masukkan Password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  {{-- <div class="form-group">
                    <label for="konfirmasi_password">Konfirmasi Password <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" onkeyup="check()" autocomplete="konfirmasi_password" autofocus placeholder="Masukkan Konfirmasi Password">
                    @error('konfirmasi_password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> --}}

                  {{-- <div class="form-group">
                    <label>Role <b style="color:Tomato;">*</b></label>
                    <select class="form-control" style="width: 100%;">
                        <option selected="selected">Super Admin</option>
                        <option>Admin</option>
                    </select>
                  </div> --}}

              </div>

              <!-- Kolom Kanan -->
              <div class="col-md-6">

                <div class="form-group">
                    <label>Gambar</label>
                    <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal ukuran gambar 2mb</em></small>
                    <div class="col-md-12">
                        <img id="preview" class="product" width="150" height="150" src="{{ asset('images/pengguna/'.$profile->gambar) }}"/>
                        <input type="file" name="gambar" class="file" accept="image/*" hidden>
                        <div class="input-group my-3">
                            <input type="text" class="form-control @error('gambar') is-invalid @enderror" disabled placeholder="Unggah Gambar" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-dark">Pilih</button>
                            </div>
                        </div>
                    </div>
                    @error('gambar')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-dark">Simpan</button>
              <a href="{{route('home')}}" class="btn btn-default">Kembali</a>
            </div>

          </form>
        </div>
        <!-- /.card -->
  </div>

</div>

@endsection

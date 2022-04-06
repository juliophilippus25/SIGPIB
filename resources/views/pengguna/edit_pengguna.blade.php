@extends('layouts.main')

@section('title', 'Pengguna')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Pengguna</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Data Pengguna</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row">

  <div class="col-md-12">

        <div class="card card-dark">
          <div class="card-header d-flex justify-content-center">
            <h3 class="card-title"><strong>Form Ubah Pengguna</strong></h3>
          </div>

          <form>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

            <!-- Kolom Kiri -->
              <div class="col-md-6">

              <div class="form-group">
                    <label for="name">Nama Pengguna <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control" id="name" value="{{ old('name', $pengguna->name) }}" autocomplete="name" autofocus placeholder="Masukkan Nama Pengguna" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email <b style="color:Tomato;">*</b></label>
                    <input type="email" class="form-control" id="email" value="{{ old('email', $pengguna->email) }}" autocomplete="email" autofocus placeholder="Masukkan Email" required>
                  </div>

                  <div class="form-group">
                    <label for="username">Username <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control" id="username" value="{{ old('username', $pengguna->username) }}" autocomplete="username" autofocus placeholder="Masukkan Username" required>
                  </div>

                  <div class="form-group">
                    <label>Role <b style="color:Tomato;">*</b></label>
                    <select class="form-control" style="width: 100%;">
                        <option selected="selected">Super Admin</option>
                        <option>Admin</option>
                    </select>
                  </div>
    
              </div>

              <!-- Kolom Kanan -->
              <div class="col-md-6">

                  <div class="form-group">
                    <label>Gambar</label>
                    <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/png dan maksimal ukuran gambar 2mb</em></small>
                      <div class="col-md-12">
                        <img id="preview" class="product" width="150" height="150"/>
                            <input type="file" name="img[]" class="file" accept="image/*" hidden>
                          <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Unggah Gambar" id="file">
                          <div class="input-group-append">
                            <button type="button" class="browse btn btn-dark">Pilih</button>
                          </div>
                        </div>
                      </div>
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

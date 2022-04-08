@extends('layouts.main')

@section('title', 'Anggota')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Anggota</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Data Anggota</a></li>
      <li class="breadcrumb-item active">Ubah Data Anggota</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row">

  <div class="col-md-12">

        <div class="card card-dark">
          <div class="card-header d-flex justify-content-center">
            <h3 class="card-title"><strong>Form Ubah Anggota</strong></h3>
          </div>

          <form action="{{ route('anggota.simpan_perbarui', ['id' => $anggota->id]) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('put') }}
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

            <!-- Kolom Kiri -->
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="kode_anggota">Kode Anggota <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control" name="kode_anggota" id="kode_anggota" value="{{ $anggota->kode_anggota }}" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Lengkap <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" value="{{ $anggota->nama }}">
                      @error('nama')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin <b style="color:Tomato;">*</b></label>
                    <br>
                      <input type="radio" name="jk" value="Pria" @php if(($anggota->jk)=='Pria') echo 'checked' @endphp> Pria
                      &nbsp;
                      <input type="radio" name="jk" value="Wanita" @php if(($anggota->jk)=='Wanita') echo 'checked' @endphp> Wanita
                    <br>
                      @error('jk')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $anggota->tempat_lahir }}">
                      @error('tempat_lahir')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Tanggal Lahir <b style="color:Tomato;">*</b></label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="tgl_lahir" class="form-control datetimepicker-input @error('tgl_lahir') is-invalid @enderror" data-target="#reservationdate" placeholder="Pilih Tanggal Lahir" value="{{ $anggota->tgl_lahir }}"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      @error('tgl_lahir')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="no_hp">Nomor Handphone <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ $anggota->no_hp }}" onkeypress="return isNumberKey(event)">
                      @error('no_hp')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ $anggota->pekerjaan }}">
                      @error('pekerjaan')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Apakah anggota ini kepala keluarga? <b style="color:Tomato;">*</b></label>
                    <br>
                      <input type="radio" name="sts_keluarga" value="Ya" @php if(($anggota->sts_keluarga)=='Ya') echo 'checked' @endphp> Ya
                      &nbsp;
                      <input type="radio" name="sts_keluarga" value="Tidak" @php if(($anggota->sts_keluarga)=='Tidak') echo 'checked' @endphp> Tidak
                    <br>
                      @error('sts_keluarga')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

              </div>

              <!-- Kolom Kanan -->
              <div class="col-md-6">

                  <div class="form-group">
                    <label>Provinsi <b style="color:Tomato;">*</b></label>
                    <select class="form-control select2bs4 @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi" style="width: 100%;">
                      <option hidden disabled selected value>Pilih Provinsi</option>
                      @foreach($provinces as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                      @endforeach
                    </select>
                    @error('provinsi')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Kabupaten <b style="color:Tomato;">*</b></label>
                    <select class="form-control select2bs4 @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten" style="width: 100%;">
                    </select>
                    @error('kabupaten')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Kecamatan <b style="color:Tomato;">*</b></label>
                    <select class="form-control select2bs4 @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan" style="width: 100%;">
                    </select>
                    @error('kecamatan')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Kelurahan <b style="color:Tomato;">*</b></label>
                    <select class="form-control select2bs4 @error('kelurahan') is-invalid @enderror" name="kelurahan" id="kelurahan" style="width: 100%;">
                    </select>
                    @error('kelurahan')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"  placeholder="Masukkan Alamat" value="{{ $anggota->alamat }}">
                      @error('alamat')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Golongan Darah <b style="color:Tomato;">*</b></label>
                    <br>
                      <input type="radio" name="goldar" value="A" @php if(($anggota->goldar)=='A') echo 'checked' @endphp> A
                      &nbsp;
                      <input type="radio" name="goldar" value="B" @php if(($anggota->goldar)=='B') echo 'checked' @endphp> B
                      &nbsp;
                      <input type="radio" name="goldar" value="O" @php if(($anggota->goldar)=='o') echo 'checked' @endphp> O
                      &nbsp;
                      <input type="radio" name="goldar" value="AB" @php if(($anggota->goldar)=='AB') echo 'checked' @endphp> AB
                    <br>
                      @error('goldar')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Gambar</label>
                    <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal ukuran gambar 2mb</em></small>
                      <div class="col-md-12">
                        <img id="preview" class="product" width="150" height="150" src="{{ asset('images/anggota/'.$anggota->gambar) }}"/>
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
              <button type="submit" class="btn btn-dark" > Simpan</button>
              <a href="{{route('anggota.index')}}" class="btn btn-default">Kembali</a>
            </div>

          </form>
        </div>
        <!-- /.card -->
  </div>

</div>

@endsection
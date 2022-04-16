@extends('layouts.main')

@section('title', 'Kartu Keluarga')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('kakel.index')}}">Data Kartu Keluarga</a></li>
      <li class="breadcrumb-item"><a href="{{ route('detailkakel.tombol_kembali') }}">Detail Kartu Keluarga</a></li>
      <li class="breadcrumb-item active">Ubah Anggota Keluarga</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Ubah Anggota Keluarga {{ $det_kakel->anggota->nama }}</strong></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{ route('detailkakel.simpan_perbarui', ['id' => $det_kakel->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('put') }}

                <div class="card-body">

                <div class="form-group">
                  <label>Status Dalam Hubungan Keluarga <b style="color:Tomato;">*</b></label>
                  <select class="form-control select2bs4 @error('sts_keluarga') is-invalid @enderror" name="sts_keluarga" style="width: 100%;">
                      <option hidden disabled selected value>Pilih Status Dalam Hubungan Keluarga</option>
                      <option value="Anak" @php if(($det_kakel->sts_keluarga)=='Anak') echo 'selected' @endphp>Anak</option>
                      <option value="Istri" @php if(($det_kakel->sts_keluarga)=='Istri') echo 'selected' @endphp>Istri</option>
                  </select>
                    @error('sts_keluarga')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Simpan</button>
                  <a href="{{ route('detailkakel.tombol_kembali') }}" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

@endsection

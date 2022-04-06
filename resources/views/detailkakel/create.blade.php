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
      <li class="breadcrumb-item"><a href="{{ route('detailkakel.index', ['id' => $kakel->id]) }}">Detail Kartu Keluarga</a></li>
      <li class="breadcrumb-item active">Tambah Anggota Keluarga</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Tambah Anggota Keluarga {{ $kakel->anggota->nama }}</strong></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="{{route('detailkakel.simpan')}}" method="POST">
              {{ csrf_field() }}
                <div class="card-body">
                
                <div class="form-group">
                  <label>Nama Anggota Keluarga <b style="color:Tomato;">*</b></label>
                  <input type="hidden" required="required" name="id_kakel" value="{{ $kakel->id }}" readonly>
                  <select class="form-control select2bs4" name="id_anggota" style="width: 100%;">
                  <option hidden disabled selected value>Pilih Anggota Keluarga</option>
                    @foreach($anggota as $data)
                      @if($data->sts_keluarga == 'Tidak')
                        <option value="{{ $data->id }}">{{ $data->kode_anggota}} - {{ $data->nama}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Status Dalam Hubungan Keluarga <b style="color:Tomato;">*</b></label>
                  <select class="form-control select2bs4" name="sts_keluarga" style="width: 100%;">
                      <option hidden disabled selected value>Pilih Status Dalam Hubungan Keluarga</option>
                      <option value="Anak">Anak</option>
                      <option value="Istri">Istri</option>
                  </select>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Simpan</button>
                  <a href="{{ route('detailkakel.index', ['id' => $kakel->id]) }}" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>  

@endsection

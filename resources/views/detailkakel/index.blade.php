@extends('layouts.main')

@section('title', 'Kartu Keluaga')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Kartu Keluaga</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('kakel.index')}}">Data Kartu Keluarga</a></li>
      <li class="breadcrumb-item active">Detail Kartu Keluarga</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
  <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Data Kartu Keluarga {{ $kakel->anggota->nama }}</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="{{ route('detailkakel.create', ['id' => $kakel->id]) }}" class="btn btn-secondary btn-fw col-lg-3"><i class="fa fa-plus"></i> Tambah Anggota Keluarga</a>      
              <br><br>
              
              <div class="col-sm-12">
                    <div class="form-group mb-0">
                        <label class="control-label">Nomor Kartu Keluarga : <b>{{ $kakel->nomor_kk }}</b></label>
                    </div>
               </div>

               <div class="col-sm-12">
                    <div class="form-group mb-0">
                        <label class="control-label">Sektor Wilayah : <b>{{ $kakel->sekwil->nama_sekwil }}</b></label>
                    </div>
               </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Status Hubungan Dalam Keluarga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @forelse($det_kakel as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->sts_keluarga }}</td>
                      <td>
                    <button type="button" class="btn btn-danger btn-sm" title="Hapus Data" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>

                  <!-- Modal -->
                  <form method="POST" action="{{ route('detailkakel.hapus', ['id' => $data->id]) }}">
                    <div class="modal fade" id="modalDelete_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          {{ csrf_field() }}
                            <p>Apakah anda yakin ingin menghapus data <b>{{ $data->nama }}</b>?</p>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane m-r-5"></i> Hapus</button>                     
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Modal -->

                      </td>
                    </tr>
                    @empty
                      <tr class="">
                        <td colspan="16">
                          <strong class="text-dark"><center>Data Kosong</center></strong>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                <a href="{{route('kakel.index')}}" class="btn btn-default">Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
  </div>  
  
@endsection

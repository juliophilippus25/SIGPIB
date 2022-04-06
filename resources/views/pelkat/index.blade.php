@extends('layouts.main')

@section('title', 'Pelayanan Kategorial')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active">Data Pelayanan Kategorial</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
  <div class="card card-dark">
              <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Data Pelayanan Kategorial</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="{{route('pelkat.create')}}" class="btn btn-secondary btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah PelKat</a>
              <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelayanan Kategorial</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @forelse($pelkat as $data)
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama_pelkat }}</td>
                      <td>
                        <a href="{{ route('detailpelkat.index', ['id' => $data->id]) }}" class="btn btn-primary  btn-sm" title="Lihat Detail" ><i class="fa fa-eye"></i></a>
                        <a href="" class="btn btn-success  btn-sm" title="Unduh" ><i class="fa fa-download"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" title="Hapus Data" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>

                  <!-- Modal -->
                  <form method="POST" action="{{ route('pelkat.hapus', ['id' => $data->id]) }}">
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
                            <p>Apakah anda yakin ingin menghapus data <b>{{ $data->nama_pelkat }}</b>?</p>

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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
  </div>

@endsection

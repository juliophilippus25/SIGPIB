@extends('layouts.main')

@section('title', 'Anggota')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Anggota</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Data Anggota</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-dark">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Data Anggota</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{route('anggota.tambah')}}" class="btn btn-secondary btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah Anggota</a>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse($anggota as $data)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode_anggota }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <img src="{{ asset('storage/images/anggota/'.$data->gambar) }}" style="width: 40px;" alt="">
                                @if ($data->gambar == null)
                                <small style="color: red;"><em>Belum ada gambar</em></small>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('anggota.tampil_detail', ['id' => $data->id]) }}" class="btn btn-primary  btn-sm" title="Lihat Detail" ><i class="fa fa-eye"></i></a>
                                <a href="{{ route('anggota.tampil_ubah', ['id' => $data->id]) }}" class="btn btn-warning  btn-sm" title="Ubah Data" ><i class="fa fa-edit"></i></a>

                                <a type="button" title="Unduh" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-download"> </i>
                                </a>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                    <a class="dropdown-item" href=""> Data</a>
                                    @if ($data->gambar != null)
                                    <a class="dropdown-item" target="_blank" href="{{ asset('storage/images/anggota/'.$data->gambar) }}"> Foto</a>
                                    @endif

                                    @if ($data->srt_baptis != null)
                                    <a class="dropdown-item" href="{{ asset('storage/dokumen/baptis/'.$data->srt_baptis) }}"> Surat Baptis</a>
                                    @endif

                                    @if ($data->srt_sidi != null)
                                    <a class="dropdown-item" href="{{ asset('storage/dokumen/sidi/'.$data->srt_sidi) }}"> Surat Sidi</a>
                                    @endif
                                </div>

                                <button type="button" class="btn btn-danger btn-sm" title="Hapus Data" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>

                                <!-- Modal Hapus -->
                                <form method="POST" action="{{ route('anggota.hapus', ['id' => $data->id]) }}">
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
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></i> Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal Hapus -->

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

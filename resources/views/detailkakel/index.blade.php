@extends('layouts.main')

@section('title', 'Kartu Keluarga')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kakel.index') }}">Data Kartu Keluarga</a></li>
            <li class="breadcrumb-item active">Detail Kartu Keluarga</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn" id="pills-keluarga-tab" data-toggle="pill"
                        data-target="#pills-keluarga" type="button" role="tab" aria-controls="pills-keluarga"
                        aria-selected="true"><i class="fa fa-people-group"></i>&nbsp;Data Keluarga</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-berkas-tab" data-toggle="pill" data-target="#pills-berkas"
                        type="button" role="tab" aria-controls="pills-berkas" aria-selected="false"><i
                            class="fa fa-file"></i>&nbsp;Data Berkas</button>
                </li>
            </ul>

        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">

                <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-keluarga" role="tabpanel"
                            aria-labelledby="pills-keluarga-tab">
                            <div class="row">

                                <div class="col-md-2">
                                    <a href="{{ route('detailkakel.create', ['id' => $kakel->id]) }}"
                                        class="btn btn-primary btn-fw col-md-12"><i class="fa fa-plus"></i> Anggota</a>
                                </div>

                                {{-- <div class="col-md-2">
                                    <a type="button" title="Unduh"
                                        class="btn btn-success btn-fw col-md-12 dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cloud-download-alt"></i> Unduh
                                    </a>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                        <a class="dropdown-item" target="_blank"
                                            href="{{ route('kakel.download_satu', ['id' => $kakel->id]) }}"></i> Data</a>
                                        @if ($kakel->srt_gereja != null)
                                            <a class="dropdown-item" target="_blank"
                                                href="{{ asset('storage/dokumen/nikahgereja/' . $kakel->srt_gereja) }}">
                                                Surat Nikah
                                                Gereja</a>
                                        @endif
                                        @if ($kakel->srt_sipil != null)
                                            <a class="dropdown-item" target="_blank"
                                                href="{{ asset('storage/dokumen/nikahsipil/' . $kakel->srt_sipil) }}"> Surat
                                                Nikah
                                                Catatan Sipil</a>
                                        @endif
                                    </div>
                                </div> --}}

                            </div>
                            <br>

                            <table>
                                <tr>
                                    <th>Kepala Keluarga </th>
                                    <td>:</td>
                                    <td>&nbsp;{{ $kakel->anggota->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Pernikahan </th>
                                    <td>:</td>
                                    <td>&nbsp;{{ $kakel->tempat_nikah }} /
                                        {{ Carbon\Carbon::parse($kakel->tgl_nikah)->isoFormat('D MMMM Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Sektor Wilayah </th>
                                    <td>:</td>
                                    <td>&nbsp;{{ $kakel->sekwil->nama_sekwil }}</td>
                                </tr>
                            </table>

                            <br>

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
                                                <a href="{{ route('detailkakel.tampil_ubah', ['id' => $data->id]) }}"
                                                    class="btn btn-warning  btn-sm" title="Ubah Data"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus Data"
                                                    data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i
                                                        class="fa fa-trash"></i></button>

                                                <!-- Modal -->
                                                <form method="POST"
                                                    action="{{ route('detailkakel.hapus', ['id' => $data->id]) }}">
                                                    <div class="modal fade" id="modalDelete_{{ $data->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Peringatan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ csrf_field() }}
                                                                    <p>Apakah anda yakin ingin menghapus data
                                                                        <b>{{ $data->nama }}</b>?
                                                                    </p>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal"><i
                                                                            class="ti-close m-r-5 f-s-12"></i>
                                                                        Tutup</button>
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            class="fa fa-paper-plane m-r-5"></i>
                                                                        Hapus</button>
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
                                            <strong class="text-dark">
                                                <center>Data Kosong</center>
                                            </strong>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="pills-berkas" role="tabpanel" aria-labelledby="pills-berkas-tab">
                            {{-- row --}}
                            <div class="row">
                                <table class="table table-borderless table-striped">

                                    <thead>
                                        <th>No</th>
                                        <th>Nama Berkas</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td style="width: 100%">
                                                <a target="_blank" href="{{ route('kakel.download_satu', ['id' => $kakel->id]) }}">PDF </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>
                                                @if ($kakel->srt_kk != null)
                                                    <a target="_blank"
                                                        href="{{ asset('storage/dokumen/kk/' . $kakel->srt_kk) }}">KARTU KELUARGA <i class="fa fa-circle-check"></i></a>
                                                @else
                                                    <a>KARTU KELUARGA <i class="fa fa-circle-xmark"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>
                                                @if ($kakel->srt_gereja != null)
                                                    <a target="_blank"
                                                        href="{{ asset('storage/dokumen/nikahgereja/' . $kakel->srt_gereja) }}">SURAT
                                                        NIKAH GEREJA <i class="fa fa-circle-check"></i></a>
                                                @else
                                                    <a>SURAT NIKAH GEREJA <i class="fa fa-circle-xmark"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td style="width: 100%">
                                                @if ($kakel->srt_sipil != null)
                                                    <a target="_blank"
                                                        href="{{ asset('storage/dokumen/nikahsipil/' . $kakel->srt_sipil) }}">SURAT
                                                        NIKAH CATATAN SIPIL <i class="fa fa-circle-check"></i></a>
                                                @else
                                                    <a>SURAT NIKAH CATATAN SIPIL <i class="fa fa-circle-xmark"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            {{-- row --}}
                        </div>
                        <br>
                        <a href="{{ route('kakel.index') }}" class="btn btn-default">Kembali</a>
                    </div>



                    <!-- /.card-body -->



                </div>

            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection

@extends('layouts.main')

@section('title', 'Pusat Unduhan')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Pusat Unduh</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item">Pusat Unduhan</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row d-flex justify-content-center">

    <div class="col-md-8">

        <div class="card card-dark">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Pusat Unduhan Data GPIB Maranatha Tanjung Selor</strong></h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-4">

                        <!-- Tombol Export Anggota -->
                        <a href="#" class="btn btn-secondary btn-fw dropdown-toggle col-md-12" title="Unduh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download"></i> Unduh PDF Anggota</a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="#"> Semua  </a>
                            @foreach ($anggota as $data)
                            <a class="dropdown-item" href="#"> {{ $data->nama }}  </a>
                            @endforeach
                        </div>
                        <!-- Tombol Export Anggota -->

                    </div>

                    <br><br>

                    <!-- Kolom Tengah -->
                    <div class="col-md-4">

                        <!-- Tombol Export PelKat -->
                        <a href="#" class="btn btn-secondary btn-fw dropdown-toggle col-md-12" title="Unduh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download"></i> Unduh PDF PelKat</a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="#"> Semua  </a>
                            @foreach ($pelkat as $data)
                            <a class="dropdown-item" href="#"> {{ $data->nama_pelkat }} </a>
                            @endforeach
                        </div>
                        <!-- Tombol Export PelKat -->

                    </div>

                    <br><br>

                    <!-- Kolom Kanan -->
                    <div class="col-md-4">

                        <!-- Tombol Export SekWil -->
                        <a href="#" class="btn btn-secondary btn-fw dropdown-toggle col-md-12" title="Unduh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download"></i> Unduh PDF SekWil</a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="#"> Semua  </a>
                            @foreach ($sekwil as $data)
                            <a class="dropdown-item" href="#"> {{ $data->nama_sekwil }} </a>
                            @endforeach
                        </div>
                        <!-- Tombol Export SekWil -->

                    </div>

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

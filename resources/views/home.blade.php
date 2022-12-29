@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')

    {{-- <div class="col-sm-6">
    <!-- <h1 class="m-0">Dashboard</h1> -->
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div><!-- /.col --> --}}

@endsection

@section('content')

@section('navbar')
    @include('layouts.navbar')
@show


<br>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card card-default">

            <div class="card-body">
                <div class="row">

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $anggota->count() }}</h3>
                                <p>Jumlah Anggota Jemaat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('dashboard.anggota') }}" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $pelkat->count() }}</h3>
                                <p>Jumlah Pelayanan Kategorial</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="{{ route('dashboard.pelkat') }}" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $sekwil->count() }}</h3>
                                <p>Jumlah Sektor Wilayah</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-map"></i>
                            </div>
                            <a href="{{ route('dashboard.sekwil') }}" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>
@endsection

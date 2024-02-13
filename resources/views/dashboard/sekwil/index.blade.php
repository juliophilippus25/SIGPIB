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
                <div class="row justify-content-center">

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
                            <a href="{{ route('sekwil.index') }}" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $kakel->count() }}</h3>
                                <p>Jumlah Kartu Keluarga</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-roof"></i>
                            </div>
                            <a href="{{ route('kakel.index') }}" class="small-box-footer">Info lebih lanjut <i
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

<div class="row">

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card card-default">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Peringatan Pernikahan Di Bulan {{ $bln }}</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Nama Kepala Keluarga</th>
                        <th>Tanggal Nikah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse($bday as $data)
                                <td>{{ $data->anggota->nama }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tgl_nikah)->isoFormat('D MMMM Y') }}</td>
                                <td>
                                    <a href="{{ route('detailkakel.index', ['id' => $data->id]) }}"
                                        class="btn btn-primary btn-sm" title="Lihat Detail"><i
                                            class="fa fa-eye"></i></a>
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
                    <tfoot>
                        <tr>
                            <td colspan=10>
                                {{ $bday->appends(Request::all())->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>

{{-- Grafik --}}

<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="sekwil"></div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- Grafik --}}

{{-- Script --}}
<script src="/highcharts/highcharts.js"></script>
{{-- <script src="/highcharts/exporting.js"></script> --}}

{{-- Sekwil --}}
<script>
    Highcharts.chart('sekwil', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sektor Wilayah'
        },
        xAxis: {
            categories: [
                'Sektor Pelayanan 1 <br/> ( {{ $kakel->where('id_sekwil', '1')->count() }} )',
                'Sektor Pelayanan 2 <br/> ( {{ $kakel->where('id_sekwil', '2')->count() }} )',
                'Sektor Pelayanan 3 <br/> ( {{ $kakel->where('id_sekwil', '3')->count() }} )'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Kartu Keluarga Per Sektor Wilayah'
            }
        },
        tooltip: {
            headerFormat: '<table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp{point.y:.f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Kartu Keluarga',
            data: [
                {{ $kakel->where('id_sekwil', '1')->count() }},
                {{ $kakel->where('id_sekwil', '2')->count() }},
                {{ $kakel->where('id_sekwil', '3')->count() }}
            ]
        }]
    });
</script>
{{-- Sekwil --}}

@endsection

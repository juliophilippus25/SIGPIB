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
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $anggota->count() }}</h3>
                                <p>Jumlah Anggota Jemaat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('anggota.index') }}" class="small-box-footer">Info lebih lanjut <i
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
                <h3 class="card-title">Rekomendasi Anggota Jemaat Baptis</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse($anggota as $data)
                                @if ($data->srt_baptis == null)
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jk }}</td>
                                    <td>
                                        <a href="{{ route('anggota.tampil_detail', ['id' => $data->id]) }}" class="btn btn-primary  btn-sm" title="Lihat Detail" ><i class="fa fa-eye"></i></a>
                                    </td>
                                @endif
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
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card card-default">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Rekomendasi Anggota Jemaat Sidi</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse($anggota as $data)
                                @if (\Carbon\Carbon::parse($data->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y') >=
                                    16 AND
                                    $data->srt_sidi == null)
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($data->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y') }} tahun
                                    </td>
                                    <td>
                                        <a href="{{ route('anggota.tampil_detail', ['id' => $data->id]) }}" class="btn btn-primary  btn-sm" title="Lihat Detail" ><i class="fa fa-eye"></i></a>
                                    </td>
                                @endif
                        </tr>
                    @empty
                        <tr>
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
            <!-- /.card-body -->
        </div>
    </div>

</div>


{{-- Grafik --}}
<div class="row">

    <div class="col-md-12">

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div id="jk"></div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="goldar"></div>
                </div>

            </div>

        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="grafik"></div>
                </div>

            </div>
        </div>
    </div>

</div>

{{-- Grafik --}}

{{-- Script --}}
<script src="/highcharts/highcharts.js"></script>
{{-- <script src="/highcharts/exporting.js"></script> --}}

{{-- Jenis Kelamin --}}
<script>
    Highcharts.chart('jk', {
        //  navigation: {
        //      buttonOptions: {
        //          enabled: false
        //      }
        // },
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Jenis Kelamin'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Jenis Kelamin',
            colorByPoint: true,
            data: [{
                name: 'Laki-laki ( {{ $anggota->where('jk', 'Laki-laki')->count() }} )',
                y: {{ $anggota->where('jk', 'Laki-laki')->count() }},
            }, {
                name: 'Perempuan ( {{ $anggota->where('jk', 'Perempuan')->count() }} )',
                y: {{ $anggota->where('jk', 'Perempuan')->count() }}
            }]
        }]
    });
</script>
{{-- Jenis Kelamin --}}

{{-- Goldar --}}
<script>
    Highcharts.chart('goldar', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Golongan Darah'
        },
        xAxis: {
            categories: [
                '<a target="_blank" title="Unduh" href="{{ route('dashboard.download_goldara_pdf') }}"> Goldar A<br/> ( {{ $anggota->where('goldar', 'A')->count() }} )</a>',
                '<a target="_blank" title="Unduh" href="{{ route('dashboard.download_goldarb_pdf') }}"> Goldar B<br/> ( {{ $anggota->where('goldar', 'B')->count() }} )</a>',
                '<a target="_blank" title="Unduh" href="{{ route('dashboard.download_goldaro_pdf') }}"> Goldar O<br/> ( {{ $anggota->where('goldar', 'O')->count() }} )</a>',
                '<a target="_blank" title="Unduh" href="{{ route('dashboard.download_goldarab_pdf') }}"> Goldar AB<br/> ( {{ $anggota->where('goldar', 'AB')->count() }} )</a>'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Anggota Per Golongan Darah'
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
            name: 'Jumlah Anggota Per Golongan Darah',
            data: [
                {{ $anggota->where('goldar', 'A')->count() }},
                {{ $anggota->where('goldar', 'B')->count() }},
                {{ $anggota->where('goldar', 'O')->count() }},
                {{ $anggota->where('goldar', 'AB')->count() }}
            ]
        }],

    });
</script>
{{-- Goldar --}}

{{-- Grafik --}}
<script>
    var bulan = <?php echo json_encode($bulan); ?>;
    var total_anggota = <?php echo json_encode($total_anggota); ?>

    Highcharts.chart('grafik', {
        title: {
            text: 'Grafik Anggota Jemaat Masuk Bulanan </br> Tahun {{ date('Y') }}'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Jumlah Anggota Jemaat'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Anggota Jemaat Masuk Bulanan',
            data: total_anggota
        }]
    })
</script>
{{-- Grafik --}}
@endsection

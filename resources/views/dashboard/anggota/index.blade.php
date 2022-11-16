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
                                    <p>Anggota Jemaat</p>
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

    {{-- Jenis Kelamin --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('jk', {
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
                    'Golongan Darah<br/> A <br/> ( {{ $anggota->where('goldar', 'A')->count() }} )',
                    'Golongan Darah<br/> B <br/> ( {{ $anggota->where('goldar', 'B')->count() }} )',
                    'Golongan Darah<br/> O <br/> ( {{ $anggota->where('goldar', 'O')->count() }} )',
                    'Golongan Darah<br/> AB <br/> ( {{ $anggota->where('goldar', 'AB')->count() }} )'
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
            }]
        });
    </script>
    {{-- Goldar --}}

    {{-- Grafik --}}
    <script>
        var anggota = <?php echo json_encode($total_anggota)?>;
        var bulan = <?php echo json_encode($bulan)?>;
        Highcharts.chart('grafik', {
            title : {
                text: 'Grafik Anggota Masuk Bulanan'
            },
            xAxis : {
                categories : bulan
            },
            yAxis : {
                title : {
                    text : 'Jumlah Anggota'
                }
            },
            plotOptions : {
                series: {
                    allowPointSelect: true
                }
            },
            series : [
                {
                    name: 'Jumlah Anggota Masuk Bulanan',
                    data: anggota
                }
            ]
        })
    </script>
    {{-- Grafik --}}
@endsection

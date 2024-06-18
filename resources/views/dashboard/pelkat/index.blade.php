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
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $pelkat->count() }}</h3>
                                <p>Jumlah Pelayanan Kategorial</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="{{ route('pelkat.index') }}" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $det_pelkat->count() }}</h3>
                                <p>Jumlah Anggota Pelkat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="{{ route('pelkat.index') }}" class="small-box-footer">Info lebih lanjut <i
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
            <div class="col-md-12">
                <div class="card">
                    <div id="pelkat"></div>
                </div>
            </div>
        </div>
    </div>

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

{{-- Pelkat --}}
<script>
    Highcharts.chart('pelkat', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Pelayanan Kategorial'
        },
        xAxis: {
            categories: [
                'Pelkat PA <br/> ( {{ $det_pelkat->where('id_pelkat', '1')->count() }} )',
                'Pelkat PT <br/> ( {{ $det_pelkat->where('id_pelkat', '2')->count() }} )',
                'Pelkat GP <br/> ( {{ $det_pelkat->where('id_pelkat', '3')->count() }} )',
                'Pelkat PKP <br/> ( {{ $det_pelkat->where('id_pelkat', '4')->count() }} )',
                'Pelkat PKB <br/> ( {{ $det_pelkat->where('id_pelkat', '5')->count() }} )',
                'Pelkat PKLU <br/> ( {{ $det_pelkat->where('id_pelkat', '6')->count() }} )'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Anggota Jemaat Per Pelkat'
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
            name: 'Jumlah Anggota Pelkat',
            data: [
                {{ $det_pelkat->where('id_pelkat', '1')->count() }},
                {{ $det_pelkat->where('id_pelkat', '2')->count() }},
                {{ $det_pelkat->where('id_pelkat', '3')->count() }},
                {{ $det_pelkat->where('id_pelkat', '4')->count() }},
                {{ $det_pelkat->where('id_pelkat', '5')->count() }},
                {{ $det_pelkat->where('id_pelkat', '6')->count() }}
            ]
        }]
    });
</script>
{{-- Pelkat --}}

{{-- Pelkat --}}
<script>
    var pa = <?php echo json_encode($total_pa); ?>;
    var pt = <?php echo json_encode($total_pt); ?>;
    var gp = <?php echo json_encode($total_gp); ?>;
    var pkp = <?php echo json_encode($total_pkp); ?>;
    var pkb = <?php echo json_encode($total_pkb); ?>;
    var pklu = <?php echo json_encode($total_pklu); ?>;
    var bulan = <?php echo json_encode($bulan); ?>;

    Highcharts.chart('grafik', {
        chart: {
            type: 'column'
        },
        title : {
            text: 'Grafik Anggota PelKat Masuk Bulanan </br> Tahun {{ date('Y') }}'
        },
        xAxis : {
            categories : bulan
        },
        yAxis : {
            title : {
                text : 'Jumlah Anggota Pelkat'
            }
        },
        plotOptions : {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'PA',
            data: pa
        }, {
            name: 'PT',
            data: pt
        }, {
            name: 'GP',
            data: gp
        }, {
            name: 'PKP',
            data: pkp
        }, {
            name: 'PKB',
            data: pkb
        }, {
            name: 'PKLU',
            data: pklu
        }]
    })

    
</script>
{{-- Pelkat --}}

@endsection

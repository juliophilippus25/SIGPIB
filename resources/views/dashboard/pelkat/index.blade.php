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
</div>
{{-- Grafik --}}

{{-- Script --}}

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
                'Pelayanan Kategorial<br/> Pelayanan Anak <br/> ( {{ $det_pelkat->where('id_pelkat', '1')->count() }} )',
                'Pelayanan Kategorial<br/> Persekutuan Teruna <br/> ( {{ $det_pelkat->where('id_pelkat', '2')->count() }} )',
                'Pelayanan Kategorial<br/> Gerakan Pemuda <br/> ( {{ $det_pelkat->where('id_pelkat', '3')->count() }} )',
                'Pelayanan Kategorial<br/> Persekutuan Kaum Perempuan <br/> ( {{ $det_pelkat->where('id_pelkat', '4')->count() }} )',
                'Pelayanan Kategorial<br/> Persekutuan Kaum Bapak <br/> ( {{ $det_pelkat->where('id_pelkat', '5')->count() }} )',
                'Pelayanan Kategorial<br/> Persekutuan Kaum Lanjut Usia <br/> ( {{ $det_pelkat->where('id_pelkat', '6')->count() }} )'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Anggota Jemaat Per Pelayanan Kategorial'
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
            name: 'Jumlah Anggota',
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

@endsection

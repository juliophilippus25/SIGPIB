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
                                <h3>{{ $det_pelkat->where('id_pelkat', '5')->count() }}</h3>
                                <p>Jumlah Anggota Pelkat PKB</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="/pelkat/detail/index/5" class="small-box-footer">Info lebih lanjut <i
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

{{-- Grafik --}}
<script>
    var anggota = <?php echo json_encode($total_anggota)?>;
    var bulan = <?php echo json_encode($bulan)?>;
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Anggota Masuk Bulanan </br> Tahun {{ date('Y') }}'
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

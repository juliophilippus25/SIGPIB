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
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $kakel->where('id_sekwil', '1')->count() }}</h3>
                                <p>Jumlah Kartu Keluarga Sektor 1</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="{{route('kakel.index')}}" class="small-box-footer">Info lebih lanjut <i
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

{{-- Grafik --}}
<script>
    var kakel = <?php echo json_encode($total_kakel)?>;
    var bulan = <?php echo json_encode($bulan)?>;
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Kartu Keluarga Masuk Bulanan </br> Tahun {{ date('Y') }}'
        },
        xAxis : {
            categories : bulan
        },
        yAxis : {
            title : {
                text : 'Jumlah Kartu Keluarga'
            }
        },
        plotOptions : {
            series: {
                allowPointSelect: true
            }
        },
        series : [
            {
                name: 'Jumlah Kartu Keluarga Masuk Bulanan',
                data: kakel
            }
        ]
    })
</script>
{{-- Grafik --}}

@endsection

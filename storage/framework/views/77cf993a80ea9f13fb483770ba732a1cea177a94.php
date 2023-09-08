<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>


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
                                <h3><?php echo e($pelkat->count()); ?></h3>
                                <p>Jumlah Pelayanan Kategorial</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="<?php echo e(route('pelkat.index')); ?>" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($det_pelkat->count()); ?></h3>
                                <p>Jumlah Anggota Pelkat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="<?php echo e(route('pelkat.index')); ?>" class="small-box-footer">Info lebih lanjut <i
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
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="/highcharts/highcharts.js"></script>



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
                'Pelkat PA <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '1')->count()); ?> )',
                'Pelkat PT <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '2')->count()); ?> )',
                'Pelkat GP <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '3')->count()); ?> )',
                'Pelkat PKP <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '4')->count()); ?> )',
                'Pelkat PKB <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '5')->count()); ?> )',
                'Pelkat PKLU <br/> ( <?php echo e($det_pelkat->where('id_pelkat', '6')->count()); ?> )'
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
                <?php echo e($det_pelkat->where('id_pelkat', '1')->count()); ?>,
                <?php echo e($det_pelkat->where('id_pelkat', '2')->count()); ?>,
                <?php echo e($det_pelkat->where('id_pelkat', '3')->count()); ?>,
                <?php echo e($det_pelkat->where('id_pelkat', '4')->count()); ?>,
                <?php echo e($det_pelkat->where('id_pelkat', '5')->count()); ?>,
                <?php echo e($det_pelkat->where('id_pelkat', '6')->count()); ?>

            ]
        }]
    });
</script>



<script>
    var pa = <?php echo json_encode($total_pa); ?>;
    var pt = <?php echo json_encode($total_pt); ?>;
    var gp = <?php echo json_encode($total_gp); ?>;
    var pkp = <?php echo json_encode($total_pkp); ?>;
    var pkb = <?php echo json_encode($total_pkb); ?>;
    var pklu = <?php echo json_encode($total_pklu); ?>;
    var bulan = <?php echo json_encode($bulan); ?>;

    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Anggota PelKat Masuk Bulanan </br> Tahun <?php echo e(date('Y')); ?>'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Jumlah Anggota Pelkat'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
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
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/dashboard/pelkat/index.blade.php ENDPATH**/ ?>
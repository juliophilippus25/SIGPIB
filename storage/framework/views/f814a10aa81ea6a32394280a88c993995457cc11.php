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
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e($kakel->where('id_sekwil', '1')->count()); ?></h3>
                                <p>Jumlah Kartu Keluarga Sektor 1</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="<?php echo e(route('kakel.index')); ?>" class="small-box-footer">Info lebih lanjut <i
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
                    <div id="grafik"></div>
                </div>
            </div>
        </div>
    </div>

</div>



<script src="/highcharts/highcharts.js"></script>



<script>
    var kakel = <?php echo json_encode($total_kakel)?>;
    var bulan = <?php echo json_encode($bulan)?>;
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Kartu Keluarga Masuk Bulanan </br> Tahun <?php echo e(date('Y')); ?>'
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/dashboard/sekwil/sektor1.blade.php ENDPATH**/ ?>
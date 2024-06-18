

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
                                <h3><?php echo e($det_pelkat->where('id_pelkat', '4')->count()); ?></h3>
                                <p>Jumlah Anggota Pelkat PKP</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-group"></i>
                            </div>
                            <a href="/pelkat/detail/index/4" class="small-box-footer">Info lebih lanjut <i
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
    var anggota = <?php echo json_encode($total_anggota)?>;
    var bulan = <?php echo json_encode($bulan)?>;
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Anggota Masuk Bulanan </br> Tahun <?php echo e(date('Y')); ?>'
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/dashboard/pelkat/pkp.blade.php ENDPATH**/ ?>
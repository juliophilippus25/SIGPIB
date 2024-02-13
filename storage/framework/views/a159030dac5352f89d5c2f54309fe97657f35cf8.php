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
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($sekwil->count()); ?></h3>
                                <p>Jumlah Sektor Wilayah</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-map"></i>
                            </div>
                            <a href="<?php echo e(route('sekwil.index')); ?>" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e($kakel->count()); ?></h3>
                                <p>Jumlah Kartu Keluarga</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-people-roof"></i>
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

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card card-default">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title">Peringatan Pernikahan Di Bulan <?php echo e($bln); ?></h3>
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
                            <?php $__empty_1 = true; $__currentLoopData = $bday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <td><?php echo e($data->anggota->nama); ?></td>
                                <td><?php echo e(Carbon\Carbon::parse($data->tgl_nikah)->isoFormat('D MMMM Y')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('detailkakel.index', ['id' => $data->id])); ?>"
                                        class="btn btn-primary btn-sm" title="Lihat Detail"><i
                                            class="fa fa-eye"></i></a>
                                </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="">
                            <td colspan="16">
                                <strong class="text-dark">
                                    <center>Data Kosong</center>
                                </strong>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=10>
                                <?php echo e($bday->appends(Request::all())->links()); ?>

                            </td>
                        </tr>
                    </tfoot>
                </table>
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
                    <div id="sekwil"></div>
                </div>

            </div>
        </div>
    </div>
</div>



<script src="/highcharts/highcharts.js"></script>



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
                'Sektor Pelayanan 1 <br/> ( <?php echo e($kakel->where('id_sekwil', '1')->count()); ?> )',
                'Sektor Pelayanan 2 <br/> ( <?php echo e($kakel->where('id_sekwil', '2')->count()); ?> )',
                'Sektor Pelayanan 3 <br/> ( <?php echo e($kakel->where('id_sekwil', '3')->count()); ?> )'
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
                <?php echo e($kakel->where('id_sekwil', '1')->count()); ?>,
                <?php echo e($kakel->where('id_sekwil', '2')->count()); ?>,
                <?php echo e($kakel->where('id_sekwil', '3')->count()); ?>

            ]
        }]
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/dashboard/sekwil/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Kartu Keluarga'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('kakel.index')); ?>">Data Kartu Keluarga</a></li>
            <li class="breadcrumb-item active">Detail Kartu Keluarga</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn" id="pills-keluarga-tab" data-toggle="pill"
                        data-target="#pills-keluarga" type="button" role="tab" aria-controls="pills-keluarga"
                        aria-selected="true"><i class="fa fa-people-group"></i>&nbsp;Data Keluarga</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-berkas-tab" data-toggle="pill" data-target="#pills-berkas"
                        type="button" role="tab" aria-controls="pills-berkas" aria-selected="false"><i
                            class="fa fa-file"></i>&nbsp;Data Berkas</button>
                </li>
            </ul>

        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">

                <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-keluarga" role="tabpanel"
                            aria-labelledby="pills-keluarga-tab">
                            <div class="row">

                                <div class="col-md-2">
                                    <a href="<?php echo e(route('detailkakel.create', ['id' => $kakel->id])); ?>"
                                        class="btn btn-primary btn-fw col-md-12"><i class="fa fa-plus"></i> Anggota</a>
                                </div>

                                

                            </div>
                            <br>

                            <table>
                                <tr>
                                    <th>Kepala Keluarga </th>
                                    <td>:</td>
                                    <td>&nbsp;<?php echo e($kakel->anggota->nama); ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Pernikahan </th>
                                    <td>:</td>
                                    <td>&nbsp;<?php echo e($kakel->tempat_nikah); ?> /
                                        <?php echo e(Carbon\Carbon::parse($kakel->tgl_nikah)->isoFormat('D MMMM Y')); ?></td>
                                </tr>
                                <tr>
                                    <th>Sektor Wilayah </th>
                                    <td>:</td>
                                    <td>&nbsp;<?php echo e($kakel->sekwil->nama_sekwil); ?></td>
                                </tr>
                            </table>

                            <br>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota Keluarga</th>
                                        <th>Status Hubungan Dalam Keluarga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $__empty_1 = true; $__currentLoopData = $det_kakel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e($data->sts_keluarga); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('detailkakel.tampil_ubah', ['id' => $data->id])); ?>"
                                                    class="btn btn-warning  btn-sm" title="Ubah Data"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus Data"
                                                    data-toggle="modal" data-target="#modalDelete_<?php echo e($data->id); ?>"><i
                                                        class="fa fa-trash"></i></button>

                                                <!-- Modal -->
                                                <form method="POST"
                                                    action="<?php echo e(route('detailkakel.hapus', ['id' => $data->id])); ?>">
                                                    <div class="modal fade" id="modalDelete_<?php echo e($data->id); ?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Peringatan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <p>Apakah anda yakin ingin menghapus data
                                                                        <b><?php echo e($data->nama); ?></b>?
                                                                    </p>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal"><i
                                                                            class="ti-close m-r-5 f-s-12"></i>
                                                                        Tutup</button>
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            class="fa fa-paper-plane m-r-5"></i>
                                                                        Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Modal -->

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
                            </table>
                        </div>

                        <div class="tab-pane fade" id="pills-berkas" role="tabpanel" aria-labelledby="pills-berkas-tab">
                            
                            <div class="row">
                                <table class="table table-borderless table-striped">

                                    <thead>
                                        <th>No</th>
                                        <th>Nama Berkas</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td style="width: 100%">
                                                <a target="_blank" href="<?php echo e(route('kakel.download_satu', ['id' => $kakel->id])); ?>">PDF </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>
                                                <?php if($kakel->srt_gereja != null): ?>
                                                    <a target="_blank"
                                                        href="<?php echo e(asset('storage/dokumen/nikahgereja/' . $kakel->srt_gereja)); ?>">SURAT
                                                        NIKAH GEREJA <i class="fa fa-circle-check"></i></a>
                                                <?php else: ?>
                                                    <a>SURAT NIKAH GEREJA <i class="fa fa-circle-xmark"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td style="width: 100%">
                                                <?php if($kakel->srt_sipil != null): ?>
                                                    <a target="_blank"
                                                        href="<?php echo e(asset('storage/dokumen/nikahsipil/' . $kakel->srt_sipil)); ?>">SURAT
                                                        NIKAH CATATAN SIPIL <i class="fa fa-circle-check"></i></a>
                                                <?php else: ?>
                                                    <a>SURAT NIKAH CATATAN SIPIL <i class="fa fa-circle-xmark"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            
                        </div>
                        <br>
                        <a href="<?php echo e(route('kakel.index')); ?>" class="btn btn-default">Kembali</a>
                    </div>



                    <!-- /.card-body -->



                </div>

            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/detailkakel/index.blade.php ENDPATH**/ ?>
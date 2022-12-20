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
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Data Kartu Keluarga <?php echo e($kakel->anggota->nama); ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-2">
                            <a href="<?php echo e(route('detailkakel.create', ['id' => $kakel->id])); ?>"
                                class="btn btn-primary btn-fw col-md-12"><i class="fa fa-plus"></i> Anggota</a>
                        </div>

                        <div class="col-md-2">
                            <a type="button" title="Unduh" class="btn btn-success btn-fw col-md-12 dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cloud-download-alt"></i> Unduh
                            </a>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <a class="dropdown-item" target="_blank"
                                    href="<?php echo e(route('kakel.download_satu', ['id' => $kakel->id])); ?>"></i> Data</a>
                                <?php if($kakel->srt_gereja != null): ?>
                                    <a class="dropdown-item" target="_blank"
                                        href="<?php echo e(asset('storage/dokumen/nikahgereja/' . $kakel->srt_gereja)); ?>"> Surat Nikah
                                        Gereja</a>
                                <?php endif; ?>
                                <?php if($kakel->srt_sipil != null): ?>
                                    <a class="dropdown-item" target="_blank"
                                        href="<?php echo e(asset('storage/dokumen/nikahsipil/' . $kakel->srt_sipil)); ?>"> Surat Nikah
                                        Catatan Sipil</a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <br>

                    <table>
                        <tr>
                            <th>Tempat Tanggal Pernikahan </th>
                            <td>:</td>
                            <td>&nbsp;<?php echo e($kakel->tempat_nikah); ?> / <?php echo e(date('d-m-Y', strtotime($kakel->tgl_nikah))); ?></td>
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
                                            class="btn btn-warning  btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" title="Hapus Data"
                                            data-toggle="modal" data-target="#modalDelete_<?php echo e($data->id); ?>"><i
                                                class="fa fa-trash"></i></button>

                                        <!-- Modal -->
                                        <form method="POST"
                                            action="<?php echo e(route('detailkakel.hapus', ['id' => $data->id])); ?>">
                                            <div class="modal fade" id="modalDelete_<?php echo e($data->id); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
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
                                                                data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i>
                                                                Tutup</button>
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-paper-plane m-r-5"></i> Hapus</button>
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
                    <br>
                    <a href="<?php echo e(route('kakel.index')); ?>" class="btn btn-default">Kembali</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/detailkakel/index.blade.php ENDPATH**/ ?>
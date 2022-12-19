<?php $__env->startSection('title', 'Detail Anggota'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Detail Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('anggota.index')); ?>">Data Anggota</a></li>
            <li class="breadcrumb-item active">Detail Data Anggota</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Detail <b><?php echo e($anggota->kode_anggota); ?></b></h3>
                </div>
                <br>

                <div class="card-body">
                    <div class="row">

                        <!-- Kolom Kiri -->
                        <div class="col-md-4">

                            <div class="form-group">
                                <?php if($anggota->gambar == null): ?>
                                    <img id="preview" class="product ml-3" style="border-radius: 25px; padding: 20px;" width="200" height="200"
                                        src="<?php echo e(asset('images/pengguna/default.png')); ?>" />
                                <?php else: ?>
                                    <img id="preview" class="product ml-3" style="border-radius: 25px; padding: 20px;" width="300" height="300"
                                        src="<?php echo e(asset('storage/images/anggota/' . $anggota->gambar)); ?>" />
                                <?php endif; ?>
                            </div>

                            <table class="table table-borderless table-striped">

                                <thead>
                                    <th><i class="fa fa-file"></i>&nbsp;DATA BERKAS</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="width: 100%">
                                            <?php if($anggota->akte_lahir != null): ?>
                                                <a class="drobdown-item" target="_blank" href="<?php echo e(asset('storage/dokumen/akte/' . $anggota->akte_lahir)); ?>">AKTE KELAHIRAN <i class="fa fa-circle-check"></i></a>
                                            <?php else: ?>
                                                <p>SURAT BAPTIS <i class="fa fa-circle-xmark"></i></p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php if($anggota->srt_baptis != null): ?>
                                                <a class="drobdown-item" target="_blank" href="<?php echo e(asset('storage/dokumen/baptis/' . $anggota->srt_baptis)); ?>">SURAT BAPTIS <i class="fa fa-circle-check"></i></a>
                                            <?php else: ?>
                                                <p>SURAT BAPTIS <i class="fa fa-circle-xmark"></i></p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%">
                                            <?php if($anggota->srt_sidi != null): ?>
                                                <a class="drobdown-item" target="_blank" href="<?php echo e(asset('storage/dokumen/sidi/' . $anggota->srt_sidi)); ?>">SURAT SIDI <i class="fa fa-circle-check"></i></a>
                                            <?php else: ?>
                                                <p>SURAT SIDI <i class="fa fa-circle-xmark"></i></p>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>


                        <!-- Kolom Kanan -->
                        <div class="col-md-8">
                            <table class="table table-borderless table-striped">

                                <thead>
                                    <th><i class="fa fa-user"></i>&nbsp;DATA PRIBADI</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="width: 25%">Nama Lengkap</td>
                                        <td>:</td>
                                        <td style="width: 70%"><?php echo e($anggota->nama); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->jk); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->tempat_lahir); ?> / <?php echo e(date('d-m-Y', strtotime($anggota->tgl_lahir))); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->pekerjaan); ?></td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->no_hp); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->alamat); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->provinsi); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kota/Kabupaten</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->kabupaten); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->kecamatan); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan/Desa</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->kelurahan); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->goldar); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kepala Keluarga</td>
                                        <td>:</td>
                                        <td><?php echo e($anggota->sts_keluarga); ?></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="<?php echo e(route('anggota.tampil_ubah', ['id' => $anggota->id])); ?>" class="btn btn-primary"><i
                            class="fa fa-edit"></i> Edit</a>
                    <a target="_blank" href="<?php echo e(route('anggota.download_satu', ['id' => $anggota->id])); ?>"
                        class="btn btn-success"><i class="fas fa-cloud-download-alt"></i> PDF</a>
                    <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-default float-right"> Kembali</a>
                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/show.blade.php ENDPATH**/ ?>
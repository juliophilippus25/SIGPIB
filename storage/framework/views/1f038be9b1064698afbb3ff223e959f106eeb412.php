<?php $__env->startSection('title', 'Anggota'); ?>

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
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn" id="pills-pribadi-tab" data-toggle="pill"
                        data-target="#pills-pribadi" type="button" role="tab" aria-controls="pills-pribadi"
                        aria-selected="true"><i class="fa fa-user"></i>&nbsp;Data Pribadi</button>
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
                        <div class="tab-pane fade show active" id="pills-pribadi" role="tabpanel"
                            aria-labelledby="pills-pribadi-tab">
                            
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-lg-4">

                                    <div class="form-group text-center">
                                        <?php if($anggota->gambar == null): ?>
                                            <img id="preview" style="border-radius: 25px; padding: 20px;" width="200"
                                                height="200" src="<?php echo e(asset('images/pengguna/default.png')); ?>" />
                                        <?php else: ?>
                                            <img id="preview" style="border-radius: 25px; padding: 20px;" width="300"
                                                height="300"
                                                src="<?php echo e(asset('storage/images/anggota/' . $anggota->gambar)); ?>" />
                                        <?php endif; ?>
                                    </div>

                                </div>

                                
                                <div class="col-lg-8">
                                    <table class="table table-borderless table-striped">

                                        <tbody>
                                            <tr>
                                                <td style="width: 30%">Kode Anggota</td>
                                                <td>:</td>
                                                <td style="width: 70%"><?php echo e($anggota->kode_anggota); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td><?php echo e($anggota->nama); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?php echo e($anggota->jk); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?php echo e($anggota->tempat_lahir); ?> /
                                                    <?php echo e(Carbon\Carbon::parse($anggota->tgl_lahir)->isoFormat('D MMMM Y')); ?>

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
                                                <a target="_blank"
                                                    href="<?php echo e(route('anggota.download_satu', ['id' => $anggota->id])); ?>">BIODATA
                                                    <i class="fa fa-circle-check"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td style="width: 100%">
                                                <?php if($anggota->akte_lahir != null): ?>
                                                    <a target="_blank"
                                                        href="<?php echo e(asset('storage/dokumen/akte/' . $anggota->akte_lahir)); ?>">AKTE
                                                        KELAHIRAN <i class="fa fa-circle-check"></i></a>
                                                <?php else: ?>
                                                    <a>AKTE KELAHIRAN <i class="fa fa-circle-xmark"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>
                                                <?php if($anggota->srt_baptis != null): ?>
                                                    <a target="_blank"
                                                        href="<?php echo e(asset('storage/dokumen/baptis/' . $anggota->srt_baptis)); ?>">SURAT
                                                        BAPTIS <i class="fa fa-circle-check"></i></a>
                                                <?php else: ?>
                                                    <a>SURAT BAPTIS <i class="fa fa-circle-xmark"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td style="width: 100%">
                                                <?php if($anggota->srt_sidi != null): ?>
                                                    <a target="_blank"
                                                        href="<?php echo e(asset('storage/dokumen/sidi/' . $anggota->srt_sidi)); ?>">SURAT
                                                        SIDI <i class="fa fa-circle-check"></i></a>
                                                <?php else: ?>
                                                    <a>SURAT SIDI <i class="fa fa-circle-xmark"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="<?php echo e(route('anggota.tampil_ubah', ['id' => $anggota->id])); ?>" class="btn btn-warning"><i
                            class="fa fa-edit"></i> Ubah</a>
                    
                    <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-default float-right"> Kembali</a>
                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/show.blade.php ENDPATH**/ ?>
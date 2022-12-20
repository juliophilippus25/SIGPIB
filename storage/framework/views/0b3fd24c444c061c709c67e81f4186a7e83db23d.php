<?php $__env->startSection('title', 'Kartu Keluarga'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('kakel.index')); ?>">Data Kartu Keluarga</a></li>
            <li class="breadcrumb-item active">Ubah Data Kartu Keluarga</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Data Kartu Keluarga <?php echo e($kakel->anggota->nama); ?></h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="<?php echo e(route('kakel.simpan_perbarui', ['id' => $kakel->id])); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <div class="card-body">
                        <input type="hidden" required="required" name="id_anggota" value="<?php echo e($kakel->id_anggota); ?>"
                            readonly>

                        <div class="form-group">
                            <label>Sektor Wilayah <b style="color:Tomato;">*</b></label>
                            <select class="form-control select2bs4 <?php $__errorArgs = ['id_sekwil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="id_sekwil" style="width: 100%;">
                                <option hidden disabled selected value>Pilih Sektor Wilayah</option>
                                <?php $__currentLoopData = $sekwil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"
                                        <?php echo e($data->id == $kakel->id_sekwil ? 'selected' : ''); ?>

                                        <?php echo e(old('id_sekwil') == $data->id ? 'selected' : ''); ?>><?php echo e($data->nama_sekwil); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['id_sekwil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="tempat_nikah">Tempat Pernikahan <b style="color:Tomato;">*</b></label>
                            <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control <?php $__errorArgs = ['tempat_nikah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tempat_nikah"
                                id="tempat_nikah" placeholder="Masukkan Tempat Pernikahan"
                                value="<?php echo e(old('tempat_nikah', $kakel->tempat_nikah)); ?>">
                            <?php $__errorArgs = ['tempat_nikah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pernikahan <b style="color:Tomato;">*</b></label>
                            <input type="date" name="tgl_nikah" id="tgl_nikah"
                                class="form-control <?php $__errorArgs = ['tgl_nikah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('tgl_nikah', $kakel->tgl_nikah)); ?>">
                            <?php $__errorArgs = ['tgl_nikah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label>Surat Nikah Gereja </label>
                            <small style="color:Tomato;"><em>Unggah surat nikah gereja maksimal ukuran file 2mb</em></small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php $__errorArgs = ['srt_gereja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="customFile" name="srt_gereja">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            <?php $__errorArgs = ['srt_gereja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($kakel->srt_gereja != null): ?>
                                <a target="_blank" href="<?php echo e(asset('storage/dokumen/nikahgereja/' . $kakel->srt_gereja)); ?>">
                                    Lihat file lama
                                </a>
                            <?php else: ?>
                            <?php endif; ?>

                        </div>

                        <div class="form-group">
                            <label>Surat Nikah Catatan Sipil</label>
                            <small style="color:Tomato;"><em>Unggah surat nikah catatan sipil maksimal ukuran file
                                    2mb</em></small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php $__errorArgs = ['srt_sipil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="customFile" name="srt_sipil">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            <?php $__errorArgs = ['srt_sipil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php if($kakel->srt_sipil != null): ?>
                                <a target="_blank" href="<?php echo e(asset('storage/dokumen/nikahsipil/' . $kakel->srt_sipil)); ?>">
                                    Lihat file lama
                                </a>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('kakel.index')); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/kakel/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Sidi'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Sidi</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('sidi.index')); ?>">Data Jemaat Sidi</a></li>
            <li class="breadcrumb-item active">Ubah Data Sidi</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Data Sidi <?php echo e($sidi->anggota->nama); ?></h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="<?php echo e(route('sidi.simpan_perbarui', ['id' => $sidi->id])); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <div class="card-body">
                        <input type="hidden" required="required" name="id_anggota" value="<?php echo e($sidi->id_anggota); ?>"
                            readonly>

                        <div class="form-group">
                            <label for="tempat_sidi">Tempat sidi <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control <?php $__errorArgs = ['tempat_sidi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tempat_sidi"
                                id="tempat_sidi" placeholder="Masukkan Tempat sidi"
                                value="<?php echo e(old('tempat_sidi', $sidi->tempat_sidi)); ?>">
                            <?php $__errorArgs = ['tempat_sidi'];
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
                            <label>Tanggal sidi <b style="color:Tomato;">*</b></label>
                            <input type="date" name="tgl_sidi" id="tgl_sidi"
                                class="form-control <?php $__errorArgs = ['tgl_sidi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('tgl_sidi', $sidi->tgl_sidi)); ?>">
                            <?php $__errorArgs = ['tgl_sidi'];
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
                            <label for="pendeta">Pendeta <b style="color:Tomato;">*</b></label>
                            <input type="text"
                                class="form-control <?php $__errorArgs = ['pendeta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pendeta"
                                id="pendeta" placeholder="Masukkan Nama Pendeta"
                                value="<?php echo e(old('pendeta', $sidi->pendeta)); ?>">
                            <?php $__errorArgs = ['pendeta'];
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


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('sidi.tampil_detail', ['id' => $sidi->id])); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/sidi/edit.blade.php ENDPATH**/ ?>
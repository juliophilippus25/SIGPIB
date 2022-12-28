

<?php $__env->startSection('title', 'Sektor Wilayah'); ?>

<?php $__env->startSection('breadcrumb'); ?>

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Sektor Wilayah</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('sekwil.index')); ?>">Data Sektor Wilayah</a></li>
      <li class="breadcrumb-item active">Tambah Data Sektor Wilayah</li>
    </ol>
  </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-default">
              <div class="card-header d-flex">
                <h3 class="card-title">Form Tambah Sektor Wilayah</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="<?php echo e(route('sekwil.simpan')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

                <div class="card-body">

                  <div class="form-group">
                    <label for="nama_sekwil">Nama Sektor Wilayah <b style="color:Tomato;">*</b></label>
                    <input type="text" class="form-control <?php $__errorArgs = ['nama_sekwil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_sekwil" id="nama_sekwil" placeholder="Masukkan Nama Sektor Wilayah">
                    <?php $__errorArgs = ['nama_sekwil'];
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
                  <a href="<?php echo e(route('sekwil.index')); ?>" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/sekwil/create.blade.php ENDPATH**/ ?>
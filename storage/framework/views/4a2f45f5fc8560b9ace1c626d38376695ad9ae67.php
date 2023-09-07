

<?php $__env->startSection('title', 'Pelayanan Kategorial'); ?>

<?php $__env->startSection('breadcrumb'); ?>

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-12">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('pelkat.index')); ?>">Data Pelayanan Kategorial</a></li>
      <li class="breadcrumb-item"><a href="<?php echo e(route('detailpelkat.tombol_kembali')); ?>">Detail Pelayanan Kategorial</a></li>
      <li class="breadcrumb-item active">Ubah Anggota Pelayanan Kategorial</li>
    </ol>
  </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row d-flex justify-content-center">
  <div class="col-md-8">

            <div class="card card-default">
              <div class="card-header d-flex">
                <h3 class="card-title">Form Ubah Pengurus Pelkat <?php echo e($det_pelkat->anggota->nama); ?></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="<?php echo e(route('detailpelkat.simpan_perbarui', ['id' => $det_pelkat->id])); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field('put')); ?>

                <div class="card-body">

                <div class="form-group">
                  <label>Jabatan Pengurus PelKat <b style="color:Tomato;">*</b></label>
                  <select class="form-control select2bs4 <?php $__errorArgs = ['pengurus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pengurus" style="width: 100%;">
                    <option hidden disabled selected value>Pilih Jabatan Pengurus PelKat</option>
                    <option value="Ketua" <?php if(($det_pelkat->pengurus)=='Ketua') echo 'selected' ?>>Ketua</option>
                    <option value="Wakil Ketua" <?php if(($det_pelkat->pengurus)=='Wakil Ketua') echo 'selected' ?>>Wakil Ketua</option>
                    <option value="Sekretaris 1" <?php if(($det_pelkat->pengurus)=='Sekretaris 1') echo 'selected' ?>>Sekretaris 1</option>
                    <option value="Sekretaris 2" <?php if(($det_pelkat->pengurus)=='Sekretaris 2') echo 'selected' ?>>Sekretaris 2</option>
                    <option value="Bendahara 1" <?php if(($det_pelkat->pengurus)=='Bendahara 1') echo 'selected' ?>>Bendahara 1</option>
                    <option value="Bendahara 2" <?php if(($det_pelkat->pengurus)=='Bendahara 2') echo 'selected' ?>>Bendahara 2</option>
                    <option value="Anggota" <?php if(($det_pelkat->pengurus)=='Anggota') echo 'selected' ?>>Anggota</option>
                  </select>
                    <?php $__errorArgs = ['pengurus'];
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
                  <a href="<?php echo e(route('detailpelkat.tombol_kembali')); ?>" class="btn btn-default">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
  </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/detailpelkat/edit.blade.php ENDPATH**/ ?>
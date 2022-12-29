<?php $__env->startSection('title', 'Pelayanan Kategorial'); ?>

<?php $__env->startSection('breadcrumb'); ?>

<div class="col-sm-6">
    <!-- <h1 class="m-0">Pelayanan Kategorial</h1> -->
</div><!-- /.col -->

<div class="col-sm-12">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('pelkat.index')); ?>">Data Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('detailpelkat.index', ['id' => $pelkat->id])); ?>">Detail Pelayanan Kategorial</a></li>
        <li class="breadcrumb-item active">Tambah Anggota Pelayanan Kategorial</li>
    </ol>
</div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row d-flex justify-content-center">
    <div class="col-md-8">

        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Form Tambah Data Pengurus <?php echo e($pelkat->nama_pelkat); ?></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form action="<?php echo e(route('detailpelkat.simpan')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Anggota PelKat <b style="color:Tomato;">*</b></label>
                        <input type="hidden" required="required" name="id_pelkat" value="<?php echo e($pelkat->id); ?>" readonly>
                        <select class="form-control select2bs4 <?php $__errorArgs = ['id_anggota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_anggota" style="width: 100%;">
                            <option hidden disabled selected value>Pilih Anggota PelKat</option>
                            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($pelkat->nama_pelkat == 'Pelayanan Anak'): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                    <?php elseif($pelkat->nama_pelkat == 'Persekutuan Teruna'): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                    <?php elseif($pelkat->nama_pelkat == 'Gerakan Pemuda' ): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                    <?php elseif($pelkat->nama_pelkat == 'Persekutuan Kaum Perempuan' AND $data->jk == 'Perempuan'): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                    <?php elseif($pelkat->nama_pelkat == 'Persekutuan Kaum Bapak' AND $data->jk == 'Laki-laki' ): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                    <?php elseif($pelkat->nama_pelkat == 'Persekutuan Kaum Lanjut Usia' ): ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo e(old('id_anggota') == $data->id ? 'selected' : ''); ?>><?php echo e($data->kode_anggota); ?> - <?php echo e($data->nama); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['id_anggota'];
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
                            <option value="Ketua" <?php if(old('pengurus') == "Ketua"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Ketua</option>
                            <option value="Wakil Ketua" <?php if(old('pengurus') == "Wakil Ketua"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Wakil Ketua</option>
                            <option value="Sekretaris 1" <?php if(old('pengurus') == "Sekretaris 1"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sekretaris 1</option>
                            <option value="Sekretaris 2" <?php if(old('pengurus') == "Sekretaris 2"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Sekretaris 2</option>
                            <option value="Bendahara 1" <?php if(old('pengurus') == "Bendahara 1"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bendahara 1</option>
                            <option value="Bendahara 2" <?php if(old('pengurus') == "Bendahara 2"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bendahara 2</option>
                            <option value="Anggota" <?php if(old('pengurus') == "Anggota"): ?> <?php echo e('selected'); ?> <?php endif; ?>>Anggota</option>
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
                    <a href="<?php echo e(route('detailpelkat.index', ['id' => $pelkat->id])); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/detailpelkat/create.blade.php ENDPATH**/ ?>
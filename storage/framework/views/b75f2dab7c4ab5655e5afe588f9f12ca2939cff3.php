<?php $__env->startSection('title', 'Anggota'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('anggota.index')); ?>">Data Anggota</a></li>
            <li class="breadcrumb-item active">Ubah Data Anggota</li>
        </ol>
    </div><!-- /.col -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Anggota</h3>
                </div>

                <form action="<?php echo e(route('anggota.simpan_perbarui', ['id' => $anggota->id])); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_anggota">Kode Anggota <b style="color:Tomato;">*</b></label>
                                    <input type="text" class="form-control" name="kode_anggota" id="kode_anggota"
                                        value="<?php echo e($anggota->kode_anggota); ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama"
                                        id="nama" placeholder="Masukkan Nama Lengkap"
                                        value="<?php echo e(old('nama', $anggota->nama)); ?>">
                                    <?php $__errorArgs = ['nama'];
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
                                    <label>Jenis Kelamin <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="jk" value="Laki-laki"
                                        <?php if(($anggota->jk)=='Laki-laki') echo 'checked' ?>> Laki-laki
                                    &nbsp;
                                    <input type="radio" name="jk" value="Perempuan"
                                        <?php if(($anggota->jk)=='Perempuan') echo 'checked' ?>> Perempuan
                                    <br>
                                    <?php $__errorArgs = ['jk'];
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

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="tempat_lahir">Tempat Lahir <b style="color:Tomato;">*</b></label>
                                        <input type="text"
                                            class="form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                                            value="<?php echo e(old('tempat_lahir', $anggota->tempat_lahir)); ?>">
                                        <?php $__errorArgs = ['tempat_lahir'];
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

                                    <div class="form-group col-6">
                                        <label>Tanggal Lahir <b style="color:Tomato;">*</b></label>
                                        <div>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir"
                                                class="form-control <?php $__errorArgs = ['tgl_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('tgl_lahir', $anggota->tgl_lahir)); ?>">
                                        </div>
                                        <?php $__errorArgs = ['tgl_lahir'];
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

                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone <b style="color:Tomato;">*</b></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone"
                                        value="<?php echo e(old('no_hp', $anggota->no_hp)); ?>" onkeypress="return isNumberKey(event)">
                                    <?php $__errorArgs = ['no_hp'];
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
                                    <label for="pekerjaan">Pekerjaan <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pekerjaan"
                                        id="pekerjaan" placeholder="Masukkan Pekerjaan"
                                        value="<?php echo e(old('pekerjaan', $anggota->pekerjaan)); ?>">
                                    <?php $__errorArgs = ['pekerjaan'];
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
                                    <label>Apakah anggota ini kepala keluarga? <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="sts_keluarga" value="Ya"
                                        <?php if(($anggota->sts_keluarga)=='Ya') echo 'checked' ?>> Ya
                                    &nbsp;
                                    <input type="radio" name="sts_keluarga" value="Tidak"
                                        <?php if(($anggota->sts_keluarga)=='Tidak') echo 'checked' ?>> Tidak
                                    <br>
                                    <?php $__errorArgs = ['sts_keluarga'];
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
                                    <label>Akte Kelahiran </label>
                                    <small style="color:Tomato;"><em>Unggah akte kelahiran maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input <?php $__errorArgs = ['akte_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="customFile" name="akte_lahir">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['akte_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($anggota->akte_lahir != null): ?>
                                        <a target="_blank"
                                            href="<?php echo e(asset('storage/dokumen/akte/' . $anggota->akte_lahir)); ?>">
                                            Lihat file lama
                                        </a>
                                    <?php else: ?>
                                        <em><small style="color:Tomato;">Akte kelahiran belum di unggah!</small></em>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Surat Baptis </label>
                                    <small style="color:Tomato;"><em>Unggah surat baptis maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input <?php $__errorArgs = ['srt_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="customFile" name="srt_baptis">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['srt_baptis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($anggota->srt_baptis != null): ?>
                                        <a target="_blank"
                                            href="<?php echo e(asset('storage/dokumen/baptis/' . $anggota->srt_baptis)); ?>">
                                            Lihat file lama
                                        </a>
                                    <?php else: ?>
                                        <em><small style="color:Tomato;">Surat baptis belum di unggah!</small></em>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label>Surat Sidi </label>
                                    <small style="color:Tomato;"><em>Unggah surat sidi maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input <?php $__errorArgs = ['srt_sidi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="customFile" name="srt_sidi">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['srt_sidi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($anggota->srt_sidi != null): ?>
                                        <a target="_blank"
                                            href="<?php echo e(asset('storage/dokumen/sidi/' . $anggota->srt_sidi)); ?>">
                                            Lihat file lama
                                        </a>
                                    <?php else: ?>
                                        <em><small style="color:Tomato;">Surat sidi belum di unggah!</small></em>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Surat Atestasi </label>
                                    <small style="color:Tomato;"><em>Unggah surat atestasi maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input <?php $__errorArgs = ['srt_atestasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="customFile" name="srt_atestasi">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['srt_atestasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php if($anggota->srt_atestasi != null): ?>
                                        <a target="_blank"
                                            href="<?php echo e(asset('storage/dokumen/atestasi/' . $anggota->srt_atestasi)); ?>">
                                            Lihat file lama
                                        </a>
                                    <?php else: ?>
                                        <em><small style="color:Tomato;">Surat atestasi belum di unggah!</small></em>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="provinsi">Provinsi <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['provinsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="provinsi"
                                        id="provinsi" placeholder="Masukkan Provinsi"
                                        value="<?php echo e(old('provinsi', $anggota->provinsi)); ?>">
                                    <?php $__errorArgs = ['provinsi'];
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
                                    <label for="kabupaten">Kota/Kabupaten <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['kabupaten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kabupaten"
                                        id="kabupaten" placeholder="Masukkan Kabupaten"
                                        value="<?php echo e(old('kabupaten', $anggota->kabupaten)); ?>">
                                    <?php $__errorArgs = ['kabupaten'];
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
                                    <label for="kecamatan">Kecamatan <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['kecamatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kecamatan"
                                        id="kecamatan" placeholder="Masukkan Kecamatan"
                                        value="<?php echo e(old('kecamatan', $anggota->kecamatan)); ?>">
                                    <?php $__errorArgs = ['kecamatan'];
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
                                    <label for="kelurahan">Kelurahan/Desa <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['kelurahan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kelurahan"
                                        id="kelurahan" placeholder="Masukkan Kelurahan"
                                        value="<?php echo e(old('kelurahan', $anggota->kelurahan)); ?>">
                                    <?php $__errorArgs = ['kelurahan'];
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
                                    <label for="alamat">Alamat <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alamat"
                                        id="alamat" placeholder="Masukkan Alamat"
                                        value="<?php echo e(old('alamat', $anggota->alamat)); ?>">
                                    <?php $__errorArgs = ['alamat'];
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
                                    <label>Golongan Darah <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="goldar" value="A"
                                        <?php if(($anggota->goldar)=='A') echo 'checked' ?>> A
                                    &nbsp;
                                    <input type="radio" name="goldar" value="B"
                                        <?php if(($anggota->goldar)=='B') echo 'checked' ?>> B
                                    &nbsp;
                                    <input type="radio" name="goldar" value="O"
                                        <?php if(($anggota->goldar)=='O') echo 'checked' ?>> O
                                    &nbsp;
                                    <input type="radio" name="goldar" value="AB"
                                        <?php if(($anggota->goldar)=='AB') echo 'checked' ?>> AB
                                    <br>
                                    <?php $__errorArgs = ['goldar'];
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
                                    <label>Gambar</label>
                                    <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal
                                            ukuran gambar 2mb</em></small>
                                    <div class="col-md-12">
                                        <img id="preview" class="product" width="150" height="150"
                                            src="<?php echo e(asset('storage/images/anggota/' . $anggota->gambar)); ?>" />
                                        <div class="input-group my-3">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="imgInp" name="gambar" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['gambar'];
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
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> Simpan</button>
                        <a href="<?php echo e(route('anggota.tampil_detail', ['id' => $anggota->id])); ?>" class="btn btn-default">Kembali</a>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/anggota/edit.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Anggota</title>
    <style type="text/css">
        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        .upper { text-transform: uppercase; }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
        }

        #table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #595cf5;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><img src="<?php echo e(public_path("images/gpib/Logo-GPIB.png")); ?>" alt="" style="width: 100px; height: 100px;"></td>
            <td class="center">
                <font size="4">GEREJA PROTESTAN di INDONESIA bagian BARAT <br> (G P I B) <br> JEMAAT "MARANATHA" TANJUNG SELOR</font> <br>
                <font size="2">Alamat: Jalan D.I. Panjaitan, No. 25 Tanjung Selor Kode Pos 77211 Kabupaten Bulungan-KALTARA <br>
                    Email: gpib.maranatha.tjs@gmail.com</font>
            </td>
        </tr>
    </table>

        <hr width="100%" align="center">
        <h4><center class="upper">LAPORAN REKOMENDASI <br> ANGGOTA JEMAAT SIDI <br> <?php echo e($tgl); ?> </center></h4>
        <table id="table">
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>No Hp</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($data->nama); ?></td>
                <td><?php echo e($data->jk); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y')); ?></td>
                <td class="center"><?php echo e(\Carbon\Carbon::parse($data->tgl_lahir)->diff(\Carbon\Carbon::now())->format('%y')); ?></td>
                <td><?php echo e($data->alamat); ?></td>
                <td><?php echo e($data->no_hp); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr class="">
                    <td colspan="16">
                        <strong class="text-dark"><center>Data Kosong</center></strong>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <p>Total Anggota Jemaat: <?php echo e($anggota->count()); ?></p>
    </body>
    </html>
<?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/laporan/sidi/rekomendasi_sidi.blade.php ENDPATH**/ ?>
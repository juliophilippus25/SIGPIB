<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Anggota</title>
    <style type="text/css">
        table {
            width: 100%;
        }
        th {
            background: #404853;
            background: linear-gradient(#687587, #404853);
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 8px;
            text-align: left;
            text-transform: capitalize;
        }
        th:first-child {
        }
        th:last-child {
        }
        td {
            padding: 8px;
        }
        td:first-child {
        }
        tr:first-child td {
        }
        tr:nth-child(even) td {
            background: #e8eae9;
        }
        tr:last-child td:first-child {
            border-bottom-left-radius: 4px;
        }
        tr:last-child td:last-child {
            border-bottom-right-radius: 4px;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ public_path("images/gpib/Logo-GPIB.png") }}" alt="" style="width: 100px; height: 100px;"></td>
            <td class="center">
                <font size="4">GEREJA PROTESTAN di INDONESIA bagian BARAT <br> (G P I B) <br> JEMAAT "MARANATHA" TANJUNG SELOR</font> <br>
                <font size="2">Alamat: Jalan D.I. Panjaitan, No. 25 Tanjung Selor Kode Pos 77211 Kabupaten Bulungan-KALTARA <br>
                    Email: gpib.maranatha.tjs@gmail.com</font>
            </td>
        </tr>
    </table>

        <hr width="100%" align="center">
        <h4><center>Laporan Data Anggota Jemaat <br> {{date('d M Y', strtotime($dt))}} </center></h4>
        <div class="row">

            <!-- Kolom Kiri -->
            <div class="col-md-4">

                <div class="form-group">
                    <img id="preview" class="product" width="200" height="200" src="{{ public_path('storage/images/anggota/'.$anggota->gambar) }}"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Nama Lengkap:</label>
                    <div>
                        <p>{{$anggota->nama}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Kepala Keluarga:</label>
                    <div>
                        <p>{{$anggota->sts_keluarga}}</p>
                    </div>
                </div>

            </div>


            <!-- Kolom Tengah -->
            <div class="col-md-4">

                <div class="form-group">
                    <label class="control-label">Jenis Kelamin:</label>
                    <div>
                        <p>{{$anggota->jk}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tempat Lahir:</label>
                    <div>
                        <p>{{$anggota->tempat_lahir}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tanggal Lahir:</label>
                    <div>
                        <p>{{date('d M Y', strtotime($anggota->tgl_lahir))}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Nomor Handphone:</label>
                    <div>
                        <p>{{$anggota->no_hp}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Pekerjaan:</label>
                    <div>
                        <p>{{$anggota->pekerjaan}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Golongan Darah:</label>
                    <div>
                        <p>{{$anggota->goldar}}</p>
                    </div>
                </div>

            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-4">

                <div class="form-group">
                    <label class="control-label">Provinsi:</label>
                    <div>
                        <p>{{$anggota->provinsi}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Kabupaten:</label>
                    <div>
                        <p>{{$anggota->kabupaten}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Kecamatan:</label>
                    <div>
                        <p>{{$anggota->kecamatan}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Kelurahan:</label>
                    <div>
                        <p>{{$anggota->kelurahan}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Alamat:</label>
                    <div>
                        <p>{{$anggota->alamat}}</p>
                    </div>
                </div>

            </div>



        </div>
        <!-- /.row -->
    </body>
    </html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Anggota {{ $anggota->nama }}</title>
    <style type="text/css">
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
                <table>
                    <tr>
                        <td class="center">
                            @if ($anggota->gambar == null)
                            <img id="preview" src="{{ public_path('images/pengguna/default.png') }}" width="200" height="200">
                            @else
                            <img id="preview" class="product" width="200" height="200" src="{{ public_path('storage/images/anggota/'.$anggota->gambar) }}"/>
                            @endif
                        </td>
                    </tr>
                </table>

                <br>

                <table style="width: 100%;">
                    <tr>
                        <td>
                            <strong>Nama Lengkap:</strong>
                            <br> {{ $anggota->nama }}
                        </td>
                        <td>
                            <strong>Jenis Kelamin:</strong>
                            <br> {{ $anggota->jk }}
                        </td>
                        <td>
                            <strong>Tempat Lahir:</strong>
                            <br> {{ $anggota->tempat_lahir }}
                        </td>
                    </tr>

                <br>

                    <tr>
                        <td>
                            <strong>Tanggal Lahir:</strong>
                            <br> {{date('d M Y', strtotime($anggota->tgl_lahir))}}
                        </td>
                        <td>
                            <strong>Nomor Handphone:</strong>
                            <br> {{ $anggota->no_hp }}
                        </td>
                        <td>
                            <strong>Pekerjaan:</strong>
                            <br> {{ $anggota->pekerjaan }}
                        </td>
                    </tr>

                <br>

                    <tr>
                        <td>
                            <strong>Golongan Darah:</strong>
                            <br> {{ $anggota->goldar }}
                        </td>
                        <td>
                            <strong>Provinsi:</strong>
                            <br> {{ $anggota->provinsi }}
                        </td>
                        <td>
                            <strong>Kabupaten:</strong>
                            <br> {{ $anggota->kabupaten }}
                        </td>
                    </tr>

                <br>

                    <tr>
                        <td>
                            <strong>Kecamatan:</strong>
                            <br> {{ $anggota->kecamatan }}
                        </td>
                        <td>
                            <strong>Kelurahan:</strong>
                            <br> {{ $anggota->kelurahan }}
                        </td>
                        <td>
                            <strong>Alamat:</strong>
                            <br> {{ $anggota->alamat }}
                        </td>
                    </tr>
                </table>

    </body>
    </html>

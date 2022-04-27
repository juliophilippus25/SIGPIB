<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Kepala Keluarga {{$kakel->anggota->nama}}</title>
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

        <h4><center>Laporan Data Kepala Keluarga <br> {{date('d M Y', strtotime($dt))}} </center></h4>

        <div class="row">
            <div class="form-group">
                <p><strong>Nama Kepala Keluarga</strong> : {{$kakel->anggota->nama}}</p>
                <p><strong>Nomor Kartu Keluarga</strong> : {{$kakel->nomor_kk}}</p>
                <p><strong>Sektor Wilayah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> : {{$kakel->sekwil->nama_sekwil}}</p>
            </div>
        </div>

        <br>
        <table style="border: 1px; border-collapse: collapse;">
            <tr>
                <th>No</th>
                <th>Nama Anggota Keluarga</th>
                <th>Status Hubungan Dalam Keluarga</th>
            </tr>
            @forelse($det_kakel as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->sts_keluarga }}</td>
            </tr>
            @empty
                <tr class="">
                    <td colspan="16">
                        <strong class="text-dark"><center>Data Kosong</center></strong>
                    </td>
                </tr>
            @endforelse
        </table>
</body>
</html>

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
        <table style="border: 1px; border-collapse: collapse;">
            <tr>
                <th >No</th>
                <th>Kode Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Hp</th>
            </tr>
            @foreach($anggota as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->kode_anggota}}</td>
                <td>{{$data->nama}}</td>
                <td>{{date('d M Y', strtotime($data->tgl_lahir))}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->no_hp}}</td>
            </tr>
            @endforeach
        </table>
    </body>
    </html>

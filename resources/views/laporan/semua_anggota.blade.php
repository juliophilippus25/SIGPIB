<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        table {
            border-spacing: 0;
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
            text-transform: uppercase;
        }
        th:first-child {
            border-top-left-radius: 4px;
            border-left: 0;
        }
        th:last-child {
            border-top-right-radius: 4px;
            border-right: 0;
        }
        td {
            border-right: 1px solid #c6c9cc;
            border-bottom: 1px solid #c6c9cc;
            padding: 8px;
        }
        td:first-child {
            border-left: 1px solid #c6c9cc;
        }
        tr:first-child td {
            border-top: 0;
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
        img {
            width: 40px;
            height: 40px;
            border-radius: 100%;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <img src="{{ public_path("images/gpib/Logo-GPIB.png") }}" alt="" style="width: 50px; height: 50px;">
    <h2 class="center">GEREJA PROTESTAN di INDONESIA bagian BARAT (GPIB) <br> JEMAAT <br> "MARANATHA" TANJUNG SELOR</h2>
    <h6 class="center">Alamat: Jalan D.I. Panjaitan, No. 25 Tanjung Selor Kode Pos 77211 Kabupaten Bulungan-KALTARA<br>
    Email: gpib.maranatha.tjs@gmail.com <br>
    <hr width="100%" align="center"> </h6>
    <h3><center>LAPORAN DATA ANGGOTA JEMAAT <br> {{date('d M Y', strtotime($dt))}} </center></h3>
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>No</th>
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

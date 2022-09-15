<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Anggota {{ $pelkat->nama_pelkat }}</title>
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
            <td>
                @if ($pelkat->nama_pelkat == "Pelayanan Anak")
                    <img src="{{ public_path("images/gpib/PA.png") }}" style="width: 80px;" alt="Pelayanan Anak" title="Pelayanan Anak">
                @elseif ($pelkat->nama_pelkat == "Persekutuan Teruna")
                    <img src="{{ public_path("images/gpib/PT.png") }}" style="width: 80px;" alt="Persekutuan Teruna" title="Persekutuan Teruna">
                @elseif ($pelkat->nama_pelkat == 'Gerakan Pemuda')
                    <img src="{{ public_path("images/gpib/GP.png") }}" style="width: 80px;" alt="Gerakan Pemuda" title="Gerakan Pemuda">
                @elseif ($pelkat->nama_pelkat == "Persekutuan Kaum Perempuan")
                    <img src="{{ public_path("images/gpib/PKP.png") }}" style="width: 80px;" alt="Persekutuan Kaum Perempuan" title="Persekutuan Kaum Perempuan">
                @elseif ($pelkat->nama_pelkat == 'Persekutuan Kaum Bapak')
                    <img src="{{ public_path("images/gpib/PKB.png") }}" style="width: 80px;" alt="Persekutuan Kaum Bapak" title="Persekutuan Kaum Bapak">
                @elseif ($pelkat->nama_pelkat == "Persekutuan Kaum Lanjut Usia")
                    <img src="{{ public_path("images/gpib/PKLU.png") }}" style="width: 80px;" alt="Persekutuan Kaum Lanjut Usia" title="Persekutuan Kaum Lanjut Usia">
                @endif
            </td>
        </tr>
    </table>

        <hr width="100%" align="center">
        <h4><center>Laporan Data Pengurus {{ $pelkat->nama_pelkat }} <br> {{date('d M Y', strtotime($dt))}} </center></h4>
        <table style="border: 1px; border-collapse: collapse;">
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Jabatan</th>
            </tr>
            @forelse($det_pelkat as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->no_hp}}</td>
                <td>{{$data->pengurus}}</td>
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

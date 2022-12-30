<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SIGPIB | Laporan Data Kepala Keluarga {{$kakel->anggota->nama}}</title>
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
            <td><img src="{{ public_path("images/gpib/Logo-GPIB.png") }}" alt="" style="width: 100px; height: 100px;"></td>
            <td class="center">
                <font size="4">GEREJA PROTESTAN di INDONESIA bagian BARAT <br> (G P I B) <br> JEMAAT "MARANATHA" TANJUNG SELOR</font> <br>
                <font size="2">Alamat: Jalan D.I. Panjaitan, No. 25 Tanjung Selor Kode Pos 77211 Kabupaten Bulungan-KALTARA <br>
                    Email: gpib.maranatha.tjs@gmail.com</font>
            </td>
        </tr>
    </table>

        <hr width="100%" align="center">

        <h4><center class="upper">Laporan Data Kartu Keluarga</center></h4>

        <table>
            <tr>
                <th align="left">Kepala Keluarga </th>
                <td>:</td>
                <td>&nbsp;{{ $kakel->anggota->nama }}</td>
            </tr>
            <tr>
                <th align="left">Tempat Tanggal Pernikahan </th>
                <td>:</td>
                <td>&nbsp;{{ $kakel->tempat_nikah }} /
                    {{ Carbon\Carbon::parse($kakel->tgl_nikah)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <th align="left">Sektor Wilayah </th>
                <td>:</td>
                <td>&nbsp;{{ $kakel->sekwil->nama_sekwil }}</td>
            </tr>
        </table>

        <br>
        <table id="table">
            <tr>
                <th>No</th>
                <th>Nama Anggota Keluarga</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Status Hubungan Dalam Keluarga</th>
            </tr>
            @forelse($det_kakel as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jk }}</td>
                <td>{{ Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
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

        <br>

        <table id="table">

            <thead>
                <th colspan="3">DATA BERKAS</th>
            </thead>

            <tbody>
                <tr>
                    <td style="width: 25%" class="bold">Surat Nikah Gereja</td>
                    <td>:</td>
                    @if ($kakel->srt_gereja == null)
                        <td style="width: 70%">-</td>
                    @else
                        <td style="width: 70%">Diterima</td>
                    @endif
                </tr>

                <tr>
                    <td style="width: 25%" class="bold">Surat Nikah Catatan Sipil</td>
                    <td>:</td>
                    @if ($kakel->srt_sipil == null)
                        <td style="width: 70%">-</td>
                    @else
                        <td style="width: 70%">Diterima</td>
                    @endif
                </tr>

            </tbody>

        </table>
        {{-- <p>Total Anggota Keluarga: {{ $det_kakel->count() }}</p> --}}
</body>
</html>

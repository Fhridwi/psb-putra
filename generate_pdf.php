
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Simulasi Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .kop-surat img {
            width: 100px;
            height: auto;
        }

        .header-text {
            text-align: center;
            flex-grow: 1;
            margin-left: 20px;
        }

        .header-text h2 {
            font-size: 20px;
            margin: 0;
        }

        .header-text h4 {
            font-size: 18px;
            margin: 5px 0;
        }

        .header-text p {
            margin: 5px 0;
            font-size: 14px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table, .data-table td, .data-table th {
            border: 1px solid #000;
        }

        .data-table th, .data-table td {
            padding: 8px;
            text-align: left;
        }

        .data-title {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="kop-surat">
            <img src="assets/logo.png" alt="Logo Kop Surat">
        </div>
        <div class="header-text">
            <h2>PANITIA PENERIMAAN SANTRI BARU</h2>
            <h4>Pondok Pesantren Bahrul Ulum Tambakberas Jombang</h4>
            <p>Jl. KH Wahab Hasbulloh Gg. III Tambakberas, Jombang</p>
        </div>
    </div>

    <div class="section-title">
        BUKTI PENDAFTARAN<br>
    </div>

    <table class="data-table">
        <tr>
            <td class="data-title">Nomor Pendaftaran</td>
            <td>0141311008900026</td>
        </tr>
        <tr>
            <td class="data-title">Nama Siswa</td>
            <td>Natasya Citra Aprilia Agustin</td>
        </tr>
        <tr>
            <td class="data-title">Asal Sekolah</td>
            <td>SDN GEMURUNG</td>
        </tr>
        <tr>
            <td class="data-title">Tempat, Tanggal Lahir</td>
            <td>Sidoarjo, 01 April 2009</td>
        </tr>
        <tr>
            <td class="data-title">Alamat</td>
            <td>Dsn. Pandewatan, RT 4/RW 3, Kelurahan Punggul, Kec. Gedangan</td>
        </tr>
        <tr>
            <td class="data-title">Latitude, Longitude (Simulasi)</td>
            <td>-7.40212635, 112.73972242</td>
        </tr>
    </table>

    <div class="section-title">DATA PILIHAN SEKOLAH</div>

    <table class="data-table">
        <tr>
            <th>Sekolah Pilihan Pertama (Simulasi)</th>
            <th>Sekolah Pilihan Kedua (Simulasi)</th>
        </tr>
        <tr>
            <td>SMP NEGERI 1 GEDANGAN<br>Skor: 213, Jarak: 770 m</td>
            <td>SMP NEGERI 1 SEDATI<br>Skor: 168, Jarak: 3.280 m</td>
        </tr>
    </table>

    <div class="qr-code">
        <img src="assets/qrcode.png" alt="QR Code">
        <p>Perangkingan didasarkan atas skor jarak tempat tinggal dengan sekolah tujuan</p>
    </div>

    <div class="footer">
        <p>Simpanlah bukti simulasi pendaftaran ini dengan baik</p>
    </div>
</body>

</html>

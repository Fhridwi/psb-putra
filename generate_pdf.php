 <?php
// session_start();
// require 'config/koneksi.php';
// require 'vendor/autoload.php'; 
// use Dompdf\Dompdf;
// use Dompdf\Options;
// 
// // Set opsi untuk Dompdf
// $options = new Options();
// $options->set('defaultFont', 'Courier');
// $dompdf = new Dompdf($options);
// 
// // Ambil data dari database
// $user_id = $_SESSION['user_id'];
// 
// // Ambil data santri
// $sql = "SELECT pas_foto, no_pendaftaran, status FROM data_santri WHERE id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $user_id);
// $stmt->execute();
// $stmt->bind_result($pas_foto, $no_pendaftaran, $status);
// $stmt->fetch();
// $stmt->close();
// 
// // Ambil data tanda tangan dan kop surat
// $kop_surat = '<img src="' . $_SERVER['DOCUMENT_ROOT'] . '/assets/kop_surat.jpg" alt="Kop Surat" style="width: 100%;"/>';
// 
// $sql = "SELECT ttd_panitia FROM data_panitia LIMIT 1";
// $result = mysqli_query($conn, $sql);
// $ttd_panitia = '';
// if ($result && mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $ttd_panitia = '<img src="' . $_SERVER['DOCUMENT_ROOT'] . '/' . $row['ttd_panitia'] . '" alt="Tanda Tangan" style="width: 150px;"/>';
// }
// 
// // Buat konten HTML
// $html = '
// <!DOCTYPE html>
// <html>
// <head>
//     <title>Bukti Pendaftaran</title>
//     <style>
//         body {
//             font-family: Arial, sans-serif;
//             margin: 20px;
//             background-color: #f4f4f4;
//         }
//         .header {
//             text-align: center;
//             background-color: #007BFF;
//             color: white;
//             padding: 20px;
//             border-radius: 10px;
//         }
//         .header img {
//             width: 100%;
//             max-width: 300px;
//         }
//         .content {
//             background: white;
//             padding: 20px;
//             border-radius: 10px;
//             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
//             margin-top: 20px;
//         }
//         h2 {
//             color: #007BFF;
//         }
//         .footer {
//             margin-top: 50px;
//             text-align: right;
//             font-style: italic;
//             color: #555;
//         }
//         .footer img {
//             width: 150px;
//             border-radius: 5px;
//         }
//         .bordered {
//             border: 2px solid #007BFF;
//             padding: 10px;
//             border-radius: 8px;
//             text-align: center;
//             margin: 20px 0;
//         }
//     </style>
// </head>
// <body>
//     <div class="header">
//         ' . $kop_surat . '
//         <h1>Bukti Pendaftaran</h1>
//     </div>
//     <div class="content"> 
//         <div class="bordered">
//             <h2>Informasi Pendaftaran</h2>
//             <p>No Pendaftaran: ' . htmlspecialchars($no_pendaftaran) . '</p>
//             <p>Status: ' . htmlspecialchars($status) . '</p>
//         </div>
//         <img src="../' . $pas_foto . '" alt="Pas Foto" style="width: 100px; border-radius: 50%;"/>
//     </div>
//     <div class="footer">
//         ' . $ttd_panitia . '
//         <p>Panitia Pendaftaran</p>
//     </div>
// </body>
// </html>
// ';
// 
// // Load konten HTML
// $dompdf->loadHtml($html);
// 
// // Atur ukuran kertas dan orientasi
// $dompdf->setPaper('A4', 'portrait');
// 
// // Render PDF
// $dompdf->render();
// 
// // Output PDF ke browser
// $dompdf->stream('bukti_pendaftaran.pdf', ['Attachment' => true]);
?>
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

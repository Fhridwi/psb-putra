<?php 
require 'config/koneksi.php'; 
session_start(); // Memulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan melakukan sanitasi
    $nama_lengkap = htmlspecialchars(trim($_POST['nama_lengkap']));
    $tempat_lahir = htmlspecialchars(trim($_POST['tempat_lahir']));
    $tanggal_lahir = htmlspecialchars(trim($_POST['tahun'])) . '-' . str_pad(htmlspecialchars(trim($_POST['bulan'])), 2, '0', STR_PAD_LEFT) . '-' . str_pad(htmlspecialchars(trim($_POST['tanggal'])), 2, '0', STR_PAD_LEFT);
    $jenis_kelamin = htmlspecialchars(trim($_POST['jenis_kelamin']));
    $asal_sekolah = htmlspecialchars(trim($_POST['asal_sekolah']));
    $nama_ayah = htmlspecialchars(trim($_POST['nama_ayah']));
    $pekerjaan_ayah = htmlspecialchars(trim($_POST['pekerjaan_ayah']));
    $penghasilan_ayah = htmlspecialchars(trim($_POST['penghasilan_ayah']));
    $status_ayah = htmlspecialchars(trim($_POST['status_ayah']));
    $nama_ibu = htmlspecialchars(trim($_POST['nama_ibu']));
    $pekerjaan_ibu = htmlspecialchars(trim($_POST['pekerjaan_ibu']));
    $penghasilan_ibu = htmlspecialchars(trim($_POST['penghasilan_ibu']));
    $status_ibu = htmlspecialchars(trim($_POST['status_ibu']));
    $nama_wali = htmlspecialchars(trim($_POST['nama_wali']));
    $pekerjaan_wali = htmlspecialchars(trim($_POST['pekerjaan_wali']));
    $penghasilan_wali = htmlspecialchars(trim($_POST['penghasilan_wali']));
    $alamat_wali = htmlspecialchars(trim($_POST['alamat_wali']));
    $nomor_wa = htmlspecialchars(trim($_POST['nomor_wa']));

    // Menghasilkan no_pendaftaran
    $no_pendaftaran = 'PSB-' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    // Membuat username dan password
    $username = strtolower(str_replace(' ', '_', $nama_lengkap));
    $password = $tempat_lahir; // Menggunakan tempat lahir sebagai password

    // Menghash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah no_pendaftaran sudah ada
    $check_query = "SELECT * FROM data_santri WHERE no_pendaftaran = '$no_pendaftaran'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Pendaftaran dengan nomor $no_pendaftaran sudah ada. Silakan coba lagi.";
        exit();
    }

    // Tentukan direktori target untuk unggahan
    $targetDir = "uploads/";

    // Membuat subdirektori jika belum ada
    $subDirs = ['pas_foto', 'scan_kk', 'scan_ktp_ortu', 'scan_akta', 'scan_skl'];
    foreach ($subDirs as $subDir) {
        if (!is_dir($targetDir . $subDir)) {
            mkdir($targetDir . $subDir, 0777, true);
        }
    }

    // Variabel untuk menyimpan jalur file
    $filePaths = [];

    // Tangani unggahan file
    foreach ($subDirs as $key) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] == 0) {
            $fileType = strtolower(pathinfo($_FILES[$key]["name"], PATHINFO_EXTENSION));
            $newFileName = $targetDir . $key . '/' . $key . '_' . $no_pendaftaran . '.' . $fileType;

            // Pindahkan file ke subdirektori yang ditentukan
            if (move_uploaded_file($_FILES[$key]["tmp_name"], $newFileName)) {
                $filePaths[$key] = $newFileName; // Simpan jalur file
            } else {
                echo "Error saat mengunggah " . $_FILES[$key]["name"];
            }
        }
    }

    // Menggunakan query biasa (tanpa prepared statement)
    $insert_santri = "INSERT INTO data_santri (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, asal_sekolah, 
                      nama_ayah, pekerjaan_ayah, penghasilan_ayah, status_ayah, nama_ibu, pekerjaan_ibu, 
                      penghasilan_ibu, status_ibu, nama_wali, pekerjaan_wali, penghasilan_wali, alamat_wali, 
                      nomor_wa, no_pendaftaran, status, pas_foto, scan_kk, scan_ktp_ortu, scan_akta, scan_skl) 
                      VALUES ('$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$asal_sekolah', 
                      '$nama_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$status_ayah', '$nama_ibu', 
                      '$pekerjaan_ibu', '$penghasilan_ibu', '$status_ibu', '$nama_wali', 
                      '$pekerjaan_wali', '$penghasilan_wali', '$alamat_wali', '$nomor_wa', 
                      '$no_pendaftaran', 'pending', '{$filePaths['pas_foto']}', '{$filePaths['scan_kk']}', 
                      '{$filePaths['scan_ktp_ortu']}', '{$filePaths['scan_akta']}', '{$filePaths['scan_skl']}')";

    if (mysqli_query($conn, $insert_santri)) {
        // Mengambil ID yang baru disisipkan
        $id_data_santri = mysqli_insert_id($conn);

        // Menyimpan informasi ke session
        $_SESSION['user_id'] = $id_data_santri; // Misalnya menyimpan ID santri
        $_SESSION['username'] = $username; // Menyimpan username
        $_SESSION['no_hp'] = $nomor_wa; // Menyimpan nomor WA
        $_SESSION['status'] = 'pending'; // Status pendaftaran
        $_SESSION['no_pendaftaran'] = $no_pendaftaran;
        $_SESSION['pas_foto'] = $filePaths['pas_foto']; // Simpan jalur foto ke session

        // Menginsert ke akun_santri
        $insert_akun = "INSERT INTO akun_santri (username, password, nomor_hp, id_data_santri, no_pendaftaran) 
                        VALUES ('$username', '$hashed_password', '$nomor_wa', '$id_data_santri', '$no_pendaftaran')";

        if (mysqli_query($conn, $insert_akun)) {
            // Redirect ke dashboard atau tampilkan pesan sukses
            header("Location: santri/"); // Sesuaikan dengan path yang benar
            exit();
        } else {
            echo "Error saat membuat akun.";
        }
    } else {
        echo "Error saat mendaftar santri.";
    }
}
?>

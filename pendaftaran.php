<?php
session_start();
require 'config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan sanitasi data dari form
    $user_id = $_SESSION['user_id']; 
    $nama_lengkap = htmlspecialchars(trim($_POST['nama_lengkap']));
    $tempat_lahir = htmlspecialchars(trim($_POST['tempat_lahir']));
    $tanggal_lahir = htmlspecialchars(trim($_POST['tanggal_lahir']));
    $jenis_kelamin = htmlspecialchars(trim($_POST['jenis_kelamin']));
    $asal_sekolah = htmlspecialchars(trim($_POST['asal_sekolah']));

    $nama_ayah = htmlspecialchars(trim($_POST['nama_ayah']));
    $pekerjaan_ayah = htmlspecialchars(trim($_POST['pekerjaan_ayah']));
    $penghasilan_ayah = htmlspecialchars(trim($_POST['penghasilan_ayah']));
    $alamat_ayah = htmlspecialchars(trim($_POST['alamat_ayah']));
    $status_ayah = htmlspecialchars(trim($_POST['status_ayah']));

    $nama_ibu = htmlspecialchars(trim($_POST['nama_ibu']));
    $pekerjaan_ibu = htmlspecialchars(trim($_POST['pekerjaan_ibu']));
    $penghasilan_ibu = htmlspecialchars(trim($_POST['penghasilan_ibu']));
    $alamat_ibu = htmlspecialchars(trim($_POST['alamat_ibu']));
    $status_ibu = htmlspecialchars(trim($_POST['status_ibu']));

    $wali_nama = htmlspecialchars(trim($_POST['wali_nama']));
    $wali_pekerjaan = htmlspecialchars(trim($_POST['wali_pekerjaan']));
    $wali_no_hp = htmlspecialchars(trim($_POST['wali_no_hp']));
    $wali_alamat = htmlspecialchars(trim($_POST['wali_alamat']));

    $program = htmlspecialchars(trim($_POST['program']));
    $jenjang = htmlspecialchars(trim($_POST['jenjang']));
    $sekolah = htmlspecialchars(trim($_POST['sekolah']));

    // Status pendaftaran default
    $status_pendaftaran = 'Pending';

    // Validasi data
    if (empty($nama_lengkap) || empty($tempat_lahir) || empty($tanggal_lahir) || empty($jenis_kelamin) || empty($asal_sekolah) || 
        empty($nama_ayah) || empty($pekerjaan_ayah) || empty($penghasilan_ayah) || empty($alamat_ayah) || empty($status_ayah) || 
        empty($nama_ibu) || empty($pekerjaan_ibu) || empty($penghasilan_ibu) || empty($alamat_ibu) || empty($status_ibu) || 
        empty($wali_nama) || empty($wali_pekerjaan) || empty($wali_no_hp) || empty($wali_alamat) || 
        empty($program) || empty($jenjang) || empty($sekolah)) {
        echo "Semua field harus diisi!";
        exit;
    }

    // Cek apakah data sudah ada
    $check_sql = "SELECT * FROM data_santri WHERE nama_lengkap = '$nama_lengkap' AND tanggal_lahir = '$tanggal_lahir' AND asal_sekolah = '$asal_sekolah'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "Data sudah ada! Pendaftaran tidak berhasil.";
        exit;
    }

    // Buat query SQL untuk menyimpan data
    $sql = "INSERT INTO data_santri (user_id, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, asal_sekolah, 
            nama_ayah, pekerjaan_ayah, penghasilan_ayah, alamat_ayah, status_ayah, 
            nama_ibu, pekerjaan_ibu, penghasilan_ibu, alamat_ibu, status_ibu, 
            wali_nama, wali_pekerjaan, wali_no_hp, wali_alamat, 
            program, jenjang, sekolah, status_pendaftaran) 
            VALUES ('$user_id', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$asal_sekolah', 
            '$nama_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$alamat_ayah', '$status_ayah', 
            '$nama_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$alamat_ibu', '$status_ibu', 
            '$wali_nama', '$wali_pekerjaan', '$wali_no_hp', '$wali_alamat', 
            '$program', '$jenjang', '$sekolah', '$status_pendaftaran')";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        // Redirect dengan SweetAlert
        echo "<script>
                alert('Pendaftaran berhasil!');
                window.location.href = 'pendaftaran.php';
              </script>";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
    
    // Tutup koneksi
    $conn->close();
    
        $check = "SELECT * FROM data_santri WHERE user_id = '$user_id'";
        $hasil = $conn->query($chek);

        $semua = "SELECT * FROM data_santri";
        $keluar = $conn->query($semua);
        $semuaData = $keluar->fetch_all(MYSQLI_ASSOC);   
        $status = $semuaData['status_pendaftaran']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenPPDB - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-200">
    <div class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <h1 class="text-lg font-bold">PSB-PA</h1>
        <span class="text-lg">PPCN</span>
    </div>

    <div class="flex h-screen">
        <div id="sidebar" class="bg-gray-800 text-gray-200 p-4 sidebar">
            <div class="flex items-center mb-6">
                <div class="bg-white rounded-full p-2 mr-2">
                    <i class="fas fa-graduation-cap text-black"></i>
                </div>
                <span class="text-xl font-bold">PSB-PCN</span>
            </div>
            <hr class="border-gray-600 mb-6"/>
            <div class="flex items-center mb-6">
                <img alt="User profile picture" class="rounded-full w-10 h-10 mr-2" src="asset/default.png"/>
                <span><?= $_SESSION['username'] ?></span>
            </div>
            <hr class="border-gray-600 mb-6"/>
            <nav>
                <ul>
                    <li class="mb-2 flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <a class="flex-1 text-gray-200  hover:bg-gray-700 rounded-lg px-4 py-2" href="index.php">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2 flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        <a class="flex-1 bg-blue-500 text-white rounded-lg px-4 py-2" href="pendaftaran.php">
                            Formulir
                        </a>
                    </li>
                    <li class="mb-2 flex items-center">
                        <i class="fas fa-print mr-2"></i>
                        <a class="flex-1 text-gray-200 hover:bg-gray-700 rounded-lg px-4 py-2" href="#">
                            Cetak Formulir
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="mt-6">
                <span class="text-gray-400 text-sm">SETTING</span>
                <ul>
                    <li class="mt-2">
                        <a class="flex items-center text-gray-200 hover:bg-gray-700 rounded-lg px-4 py-2" href="logout.php">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
            <div id="toggle-btn" class="toggle-btn mt-6">
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
        
        <div id="main-content" class="flex-1 p-4 main-content">
        <h2 class="text-2xl font-bold mb-4 text-center">Form Pendaftaran Calon Santri</h2>

        <?php if (isset($hasil)): ?>
<form action="pendaftaran.php" method="POST" id="registrationForm">

    <!-- Data Calon Santri -->
    <h3 class="text-lg font-bold mb-4">Data Calon Santri:</h3>

    <div class="flex flex-col mb-4">
        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih jenis kelamin</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
    </div>
    <div class="flex flex-col mb-4">
        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
        <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan asal sekolah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>

    <!-- Data Orang Tua Calon Siswa -->
    <h3 class="text-lg font-bold mb-4">Data Orang Tua Calon Siswa:</h3>

    <!-- Data Ayah -->
    <h4 class="font-bold mb-2">Data Ayah:</h4>
    <div class="flex flex-col mb-4">
        <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
        <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Masukkan nama ayah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan pekerjaan ayah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700">Penghasilan Ayah</label>
        <input type="number" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Masukkan penghasilan ayah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="alamat_ayah" class="block text-sm font-medium text-gray-700">Alamat Ayah</label>
        <input type="text" id="alamat_ayah" name="alamat_ayah" placeholder="Masukkan alamat ayah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="status_ayah" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status_ayah" name="status_ayah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih status</option>
            <option value="hidup">Hidup</option>
            <option value="meninggal">Meninggal</option>
        </select>
    </div>

    <!-- Data Ibu -->
    <h4 class="font-bold mb-2">Data Ibu:</h4>
    <div class="flex flex-col mb-4">
        <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
        <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Masukkan nama ibu" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan pekerjaan ibu" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700">Penghasilan Ibu</label>
        <input type="number" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Masukkan penghasilan ibu" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="alamat_ibu" class="block text-sm font-medium text-gray-700">Alamat Ibu</label>
        <input type="text" id="alamat_ibu" name="alamat_ibu" placeholder="Masukkan alamat ibu" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="status_ibu" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="status_ibu" name="status_ibu" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih status</option>
            <option value="hidup">Hidup</option>
            <option value="meninggal">Meninggal</option>
        </select>
    </div>

    <!-- Data Wali Santri -->
    <h3 class="text-lg font-bold mb-4">Data Wali Santri:</h3>
    
    <div class="flex flex-col mb-4">
        <label for="wali_nama" class="block text-sm font-medium text-gray-700">Nama Wali</label>
        <input type="text" id="wali_nama" name="wali_nama" placeholder="Masukkan nama wali" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="wali_pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan Wali</label>
        <input type="text" id="wali_pekerjaan" name="wali_pekerjaan" placeholder="Masukkan pekerjaan wali" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="wali_no_hp" class="block text-sm font-medium text-gray-700">No HP Wali</label>
        <input type="text" id="wali_no_hp" name="wali_no_hp" placeholder="Masukkan no HP wali" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>
    <div class="flex flex-col mb-4">
        <label for="wali_alamat" class="block text-sm font-medium text-gray-700">Alamat Wali</label>
        <input type="text" id="wali_alamat" name="wali_alamat" placeholder="Masukkan alamat wali" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2" />
    </div>

    <!-- Program -->
    <h3 class="text-lg font-bold mb-4">Program:</h3>
    <div class="flex flex-col mb-4">
        <label for="program" class="block text-sm font-medium text-gray-700">Hafalan</label>
        <select id="program" name="program" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih program</option>
            <option value="intensif">Intensif</option>
            <option value="reguler">Reguler</option>
        </select>
    </div>
    <div class="flex flex-col mb-4">
        <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
        <select id="jenjang" name="jenjang" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih jenjang</option>
            <option value="mi">MI</option>
            <option value="mtsn">MTsN</option>
            <option value="smk">SMK/MAN</option>
            <option value="pt">Perguruan Tinggi</option>
        </select>
    </div>
    <div class="flex flex-col mb-4">
        <label for="sekolah" class="block text-sm font-medium text-gray-700">Sekolah</label>
        <select id="sekolah" name="sekolah" required class="mt-1 block w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 p-2">
            <option value="" disabled selected>Pilih sekolah</option>
            <option value="mi_bu">MI BU</option>
            <option value="mts_bu">MTS BU</option>
            <option value="man_3">MAN 3</option>
            <option value="unwaha">UNWAHA</option>
        </select>
    </div>

    <div class="flex items-center mb-4">
        <input type="checkbox" id="terms" required class="mr-2">
        <label for="terms" class="text-sm">Saya setuju dengan <a href="#" class="text-blue-500">syarat dan ketentuan</a>.</label>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-10" id="submitBtn" disabled>
        Daftar
    </button>
</form>
<?php else: ?>
    <?php $status = isset($semuaData['status_pendaftaran']) ? $semuaData['status_pendaftaran'] : 'unknown';
 ?>
    <div class="card <?php echo $status == 'Pending' ? 'pending' : 'verified'; ?>">
    <h1>Status: <?php echo ucfirst($status); ?></h1>
    <p><?php echo $status == 'Pending' ? 'Mohon tunggu hingga verifikasi selesai.' : 'Terima kasih! Status Anda telah diverifikasi.'; ?></p>
</div>
    <?php endif; ?>

    </div>
</div>

    
    <script src="js/main.js"></script>
</body>
</html>

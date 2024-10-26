<?php
session_start();
require '../config/koneksi.php'; // Pastikan koneksi ke database sudah benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user status based on no_pendaftaran
$noPendaftaran = $_SESSION['no_pendaftaran'];
$sql = "SELECT status FROM data_santri WHERE no_pendaftaran = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $noPendaftaran);
$stmt->execute();
$stmt->bind_result($status);
$stmt->fetch();
$stmt->close();

$user_id = $_SESSION['user_id'];
// Ambil data santri dari database
$query = "SELECT pas_foto FROM data_santri WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0 ) {
    $row = mysqli_fetch_assoc($result);
    $foto_profil = '../' . $row['pas_foto'] ; 
} else {
    $foto_profil = '../assets/default.png'; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenPPDB - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            overflow: hidden;
        }

        #main-content {
            overflow-y: auto;
            height: calc(100vh - 64px); /* Adjust height to account for the footer */
        }

        .navbar {
            background: linear-gradient(180deg, #4caf50, #2e7d32); /* Green gradient */
        }

        .sidebar {
            background-color: #1b5e20; /* Dark green */
        }

        .sidebar a,
        .navbar a {
            color: white; /* White text for links */
        }

        .sidebar a:hover,
        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Lighten on hover */
        }
    </style>
</head>

<body class="bg-gray-200">

    <div class="navbar text-white p-4 flex justify-between items-center">
        <h1 class="text-lg font-bold">PSB-PA</h1>
        <span class="text-lg">PPCN</span>
    </div>

    <div class="flex h-screen">
        <div id="sidebar" class="sidebar text-gray-200 p-4">
            <div class="flex items-center mb-6">
                <div class="bg-white rounded-full p-2 mr-2">
                    <i class="fas fa-graduation-cap text-black"></i>
                </div>
                <span class="text-xl font-bold">PSB-PCN</span>
            </div>

            <hr class="border-gray-600 mb-6" />

            <div class="flex items-center mb-6">
                <img alt="User profile picture" class="rounded-full w-10 h-10 mr-2 object-cover object-top" src="<?= $foto_profil ?>" />
                <span><?= htmlspecialchars($_SESSION['username']) ?></span>
            </div>

            <hr class="border-gray-600 mb-6" />

            <nav>
                <ul>
                    <li class="mb-2 flex items-center">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <a class="flex-1 bg-green-900 text-white rounded-lg px-4 py-2" href="#">
                            Dashboard
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="mt-6">
                <span class="text-gray-400 text-sm">SETTING</span>
                <ul>
                    <li class="mt-2">
                        <a class="flex items-center text-gray-200 hover:bg-gray-700 rounded-lg px-4 py-2" href="../logout.php">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>

            <div id="toggle-btn" class="toggle-btn mt-6 cursor-pointer">
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div id="main-content" class="flex-1 p-4 main-content">
            <!-- Kartu Status -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 xl:mx-auto">
                <div class="<?= htmlspecialchars($status) == 'diterima' ? 'bg-green-500' : (htmlspecialchars($status) == 'pending' ? 'bg-yellow-500' : 'bg-red-500') ?> p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold text-white">Status: <?= htmlspecialchars($status) ?: 'Belum Diisi' ?></h2>
                    <p class="text-white">Terima kasih telah mengisi dengan benar</p>
                </div>
            </div>

            <!-- New Menu Items Below Status -->
       <!-- New Menu Items Below Status -->
<div class="mt-6">
    <h2 class="text-lg font-bold mb-4">Menu Akses</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
    <div class="bg-green-900 text-white p-4 rounded-lg shadow-md flex flex-col items-center">
            <i class="fas fa-user fa-2x mb-2"></i>
            <a class="text-center" href="data_detail.php">Data Anda</a>
        </div>

        <div class="bg-green-900 text-white p-4 rounded-lg shadow-md flex flex-col items-center">
    <i class="fas fa-print fa-2x mb-2"></i>
    <a class="text-center" href="../generate_pdf.php" onclick="setTimeout(function(){ window.location.href='index.php'; }, 1000); return true;">Cetak Bukti Daftar</a>
</div>

<a class="text-center" href="https://wa.me/6285792336956" target="_blank">
<div class="bg-green-900 text-white p-4 rounded-lg shadow-md flex flex-col items-center">
    <i class="fas fa-envelope fa-2x mb-2"></i>
   Kontak Panitia
</div>
</a>

    </div>
</div>

        </div>
    </div>

    <footer class="text-gray-700 text-center py-4 fixed bottom-0 left-0 w-full">
        <p class="text-sm">© <?= date("Y") ?> PSB-PA. Semua hak dilindungi.</p>
    </footer>

    <script src="../js/main.js"></script>
</body>

</html>

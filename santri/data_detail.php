<?php
session_start();
require '../config/koneksi.php'; // Ensure the database connection is correct

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch all student details based on user ID
$query = "SELECT * FROM data_santri WHERE id = $user_id"; // Directly use the user ID
$result = $conn->query($query);
$student = $result->fetch_assoc();

// Prepare photo path
$foto_profil = $student['pas_foto'] ? '../' . $student['pas_foto'] : '../assets/default.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenPPDB - Data Santri</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            overflow: hidden;
        }
        #main-content {
            overflow-y: auto;
            height: calc(100vh - 64px);
        }
        .navbar {
            background: linear-gradient(180deg, #4caf50, #2e7d32);
        }
        .sidebar {
            background-color: #1b5e20;
        }
        .report-card {
            border: 2px solid #4caf50;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .report-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }
        .report-card p {
            margin: 8px 0;
            font-size: 16px;
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
            <!-- Sidebar content -->
        </div>

        <div id="main-content" class="flex-1 p-4 main-content">
            <div class="report-card">
                <h2>Data Diri Santri</h2>
                <div class="flex items-center mb-4">
                    <img alt="User profile picture" class="rounded-full w-20 h-20 mr-4 object-cover" src="<?= htmlspecialchars($foto_profil) ?>" />
                    <div>
                        <p><strong>Nama:</strong> <?= htmlspecialchars($student['nama_lengkap']) ?></p>
                        <p><strong>Tempat Lahir:</strong> <?= htmlspecialchars($student['tempat_lahir']) ?></p>
                        <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($student['tanggal_lahir']) ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($student['jenis_kelamin']) ?></p>
                        <p><strong>Asal Sekolah:</strong> <?= htmlspecialchars($student['asal_sekolah']) ?></p>
                        <p><strong>Nama Ayah:</strong> <?= htmlspecialchars($student['nama_ayah']) ?></p>
                        <p><strong>Nama Ibu:</strong> <?= htmlspecialchars($student['nama_ibu']) ?></p>
                        <p><strong>Nama Wali:</strong> <?= htmlspecialchars($student['nama_wali']) ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($student['status']) ?></p>
                        <p><strong>No Pendaftaran:</strong> <?= htmlspecialchars($student['no_pendaftaran']) ?></p>
                    </div>
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

<?php 
require '../config/koneksi.php'; 
session_start(); // Memulai session

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil informasi dari session
$username = $_SESSION['username'];
$nomor_wa = $_SESSION['no_hp'];
$foto_profil = $_SESSION['pas_foto'] ?? 'https://via.placeholder.com/100'; // Default jika tidak ada foto

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        header {
            background-color: #4CAF50; /* Ganti menjadi hijau */
            color: white;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logout-icon {
            font-size: 24px;
            cursor: pointer;
        }

        h1 {
            font-size: 22px;
            text-align: center;
            flex-grow: 1;
        }

        .profile {
            text-align: center;
            margin: 20px 0;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .profile h2 {
            margin-top: 10px;
            font-size: 20px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 20px;
        }

        .dashboard-grid div {
            background-color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-grid div i {
            font-size: 50px;
            margin-bottom: 10px;
            color: #4CAF50; /* Warna ikon */
        }

        .dashboard-grid div p {
            margin-top: 5px;
            font-size: 16px;
            color: #333;
        }

        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            header h1 {
                font-size: 18px;
            }

            .profile img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logout-icon" onclick="window.location.href='../logout.php'"><i class="fas fa-sign-out-alt"></i></div>
        <h1>Dashboard</h1>
        <div class="notification"><i class="fas fa-bell"></i></div>
    </header>

    <div class="profile">
        <img src="<?php echo htmlspecialchars($foto_profil); ?>" alt="Profile">
        <h2><?php echo htmlspecialchars($username); ?></h2>
    </div>

    <div class="dashboard-grid">
        <div>
            <i class="fas fa-user-circle"></i>
            <p>Data Anda</p>
        </div>
        <div>
            <i class="fas fa-info-circle"></i>
            <p>Info Terkini</p>
        </div>
        <div>
            <i class="fas fa-user-tie"></i>
            <p>Akun Anda</p>
        </div>
        <div>
            <i class="fas fa-print"></i>
            <p>Cetak Bukti</p>
        </div>
        <div>
            <i class="fas fa-phone-alt"></i>
            <p>Kontak Panitia</p>
        </div>
    </div>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
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
                        <a class="flex-1 bg-blue-500 text-white rounded-lg px-4 py-2" href="#">
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2 flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        <a class="flex-1 text-gray-200 hover:bg-gray-700 rounded-lg px-4 py-2" href="pendaftaran.php">
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
            <h2 class="text-2xl font-bold mb-4">Selamat Datang, <?= $_SESSION['username'] ?>!</h2>
         
            <!-- Kartu Status -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <div class="bg-red-500 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold text-white">Status: Belum Diisi</h2>
                    <p class="text-white">Silakan lengkapi data pendaftaran.</p>
                </div>
            </div>

            <!-- Alur Pendaftaran -->
            <div class="mt-6 bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-bold mb-2">Alur Pendaftaran:</h3>
                <div class="flex flex-col space-y-2">
                    <div class="flex items-center">
                        <div class="bg-green-500 rounded-full w-8 h-8 flex items-center justify-center text-white font-bold mr-2">1</div>
                        <span>Login</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-red-500 rounded-full w-8 h-8 flex items-center justify-center text-white font-bold mr-2">2</div>
                        <span>Melengkapi Form dan Dokumen</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-red-500 rounded-full w-8 h-8 flex items-center justify-center text-white font-bold mr-2">3</div>
                        <span>Verifikasi Panitia</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-red-500 rounded-full w-8 h-8 flex items-center justify-center text-white font-bold mr-2">4</div>
                        <span>Cetak Bukti Pendaftaran</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mt-4 items-center">
                <i class="fas fa-info-circle text-blue-500 mr-2"> Informasi </i><br>
                <span>Setelah dikonfirmasi, Anda akan mendapatkan chat dari admin mengenai pembayaran. Pastikan nomor telepon pada akun terdaftar di WhatsApp/aktif.</span>
            </div>

            <!-- Tombol Info Akun dan Chat Panitia -->
            <div class="mt-4 flex space-x-4">
                <button onclick="openModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                    Info Akun
                </button>
                <a href="chat_admin.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                    Chat Panitia
                </a>
            </div>

            <!-- Modal Data Akun -->
            <div id="accountModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-lg p-6 w-11/12 max-w-md">
                    <h3 class="text-lg font-bold mb-4">Data Akun</h3>
                    <p><strong>Username:</strong> <?= $_SESSION['username'] ?></p>
                    <p><strong>No HP:</strong> <?= $_SESSION['no_hp'] ?></p>
                    <p><strong>Email:</strong> <?= $_SESSION['email'] ?></p>
                    <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-4">
        <p class="text-sm">© <?= date("Y") ?> PSB-PA. Semua hak dilindungi.</p>
    </footer>
<script src="js/main.js"></script>
</body>
</html>

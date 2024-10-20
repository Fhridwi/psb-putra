<?php
require 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp']; // Pastikan Anda juga menambahkan input ini di form HTML
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Menghasilkan nomor pendaftaran yang unik
    $no_pendaftaran = generateRegistrationNumber($conn);

    // Siapkan dan jalankan query
    $stmt = $conn->prepare("INSERT INTO users (username, email, nomor_hp, password, no_pendaftaran) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $nomor_hp, $password, $no_pendaftaran);

    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! Nomor pendaftaran Anda: " . $no_pendaftaran;
        header("Location: login.php");
        exit;
    } else {
        echo "Gagal mendaftar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();

function generateRegistrationNumber($conn) {
    // Menghasilkan 4 digit angka acak
    $randomNumber = sprintf("%04d", rand(0, 9999));
    $no_pendaftaran = "PSB-" . $randomNumber;

    // Cek apakah nomor pendaftaran sudah ada
    $stmt = $conn->prepare("SELECT * FROM users WHERE no_pendaftaran = ?");
    $stmt->bind_param("s", $no_pendaftaran);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika sudah ada, ulangi proses
    if ($result->num_rows > 0) {
        return generateRegistrationNumber($conn);
    }

    return $no_pendaftaran;
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Register</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Register</h2>
        <form action="register.php" method="POST">
            <div class="mt-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <div class="relative mt-1">
                    <input type="text" id="username" name="username" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan username" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="email-register" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1">
                    <input type="email" id="email-register" name="email" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan email" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="nomor_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <div class="relative mt-1">
                    <input type="text" id="nomor_hp" name="nomor_hp" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan nomor HP" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-phone text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="password-register" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <input type="password" id="password-register" name="password" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Register</button>
        </form>
        
        <p class="mt-4 text-center">Sudah punya akun? <a href="login.php" class="text-blue-600">Login di sini</a></p>
    </div>

</body>
</html>

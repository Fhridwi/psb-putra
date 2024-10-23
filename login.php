<?php
session_start();
require 'config/koneksi.php'; // Pastikan koneksi ke database sudah benar

$error = ""; // Initialize error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan melakukan sanitasi
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Query untuk mencari pengguna berdasarkan username
    $query = "SELECT * FROM akun_santri WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Memeriksa password
        if (password_verify($password, $user['password'])) {
            // Regenerate session ID
            session_regenerate_id(true);
            
            // Menyimpan data ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['no_hp'] = $user['nomor_hp'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['no_pendaftaran'] = $user['no_pendaftaran']; // Ambil no pendaftaran
            $_SESSION['pas_foto'] = $user['pas_foto']; 
            
            // Redirect ke dashboard
            header("Location: santri/"); // Sesuaikan dengan path yang benar
            exit();
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PSB-PA</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="username" class="block mb-2">Username</label>
                <input type="text" name="username" id="username" required class="border rounded w-full p-2" />
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Password</label>
                <input type="password" name="password" id="password" required class="border rounded w-full p-2" />
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded w-full p-2">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="register.php" class="text-blue-500">Belum punya akun? Daftar di sini.</a>
        </div>
    </div>

</body>
</html>

<?php
require 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; 
            $_SESSION['email'] = $user['email'];
            $_SESSION['no_hp'] = $user['nomor_hp'];
            

            // Mengalihkan ke index.php
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Password salah.";
        }
    } else {
        $error_message = "Email tidak ditemukan.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Login</h2>

        <?php if (isset($error_message)): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo $error_message; ?>'
                }).then(() => {
                    // Menggunakan JavaScript untuk redirect jika login gagal
                    window.location.href = 'login.php';
                });
            </script>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative mt-1">
                    <input type="email" id="email" name="email" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan email" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <input type="password" id="password" name="password" class="block w-full p-2 pl-10 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Masukkan password" required>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-6 w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700">Login</button>
        </form>
        
        <p class="mt-4 text-center">Belum punya akun? <a href="register.php" class="text-blue-600">Daftar di sini</a></p>
    </div>

</body>
</html>

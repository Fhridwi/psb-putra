<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPDB ONLINE || Pendaftaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@600;900&display=swap" rel="stylesheet">

    <style>
        .navbar {
            transition: background-color 0.3s;
        }

        .navbar-white {
            background-color: white;
        }

        .bg-section {
            background-image: url('assets/background.jpg'); /* Ganti dengan URL gambar latar belakang yang diinginkan */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .bg-opacity {
            background-color: rgba(255, 255, 255, 0.7); /* Efek opacity putih */
            position: relative;
            z-index: 10;
        }

        @media (max-width: 1024px) {
        .flex.justify-center {
            justify-content: center !important;
        }
    }
    </style>
</head>

<body class="bg-gray-100">

<header class="shadow fixed top-0 left-0 w-full z-50 navbar navbar-white">
    <nav class="container mx-auto flex items-center justify-between py-4">
        <a class="block md:hidden text-2xl font-bold" href="#">
            <img src="assets/logo-j.png" alt="logo" class="w-36 ml-4">
        </a>
        <a class="hidden md:block text-2xl font-bold" href="#">
            <img src="assets/logo-j.png" alt="logo" class="w-64">
        </a>
        <div class="flex items-center space-x-6">
            <div class="hidden lg:flex space-x-6 font-bold text-[14px]">
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-home"></i> Home</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-file-alt"></i> Syarat</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-road"></i> Alur</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-info-circle"></i> Informasi</a>
            </div>
            <a href="daftar.php" class="hidden lg:block px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Daftar</a>
        </div>
        <div class="lg:hidden relative">
            <button class="block focus:outline-none mr-5" id="menu-btn" aria-label="Toggle Menu">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div id="mobile-menu" class="absolute right-0 w-[150px] mr-2 bg-white shadow-lg rounded-lg mt-3 hidden z-50">
                <div class="flex flex-col">
                    <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-home"></i> Home</a>
                    <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-file-alt"></i> Syarat</a>
                    <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-road"></i> Alur</a>
                    <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-info-circle"></i> Informasi</a>
                    <a href="daftar.php" class="mt-2 block px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Daftar</a>
                    <a href="login.php" class="mt-2 block px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Login</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<section class="bg-section">
    <div class="bg-opacity px-4 py-8 mx-auto flex flex-col items-center lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 mt-16 lg:grid grid-cols-1 lg:grid-cols-12 min-h-screen">
        <div class="lg:col-span-7 flex justify-center lg:justify-start mb-1 md:mx-auto">
            <img src="assets/logo.png" alt="Logo Pesantren" class="w-20 lg:w-36">
        </div>

        <!-- Konten Tulisan -->
        <div class="mr-auto text-center lg:text-left lg:col-span-7 ml-30">
            <h1 class="text-2xl font-bold mb-4 lg:text-4xl">Pesantren Cemerlang An-Najach</h1>
            <p class="text-xl italic mb-4 md:text-sm lg:text-lg">"Membina iman, ilmu dan akhlak"</p>
            <h2 class="text-xl font-semibold mb-4">Pendaftaran Santri Baru An-Najach 2025 - 2026</h2>
            <div class="flex flex-col sm:flex-row gap-2 mt-4 justify-center lg:justify-start">
                <a href="daftar.php" class="px-3 py-3 text-white bg-green-600 hover:bg-green-700 rounded-lg transition w-full sm:w-auto text-center">Daftar</a>
                <a href="hasil.php" class="px-3 py-3 text-white bg-green-600 hover:bg-green-700 rounded-lg transition w-full sm:w-auto text-center">Panduan</a>
            </div>
        </div>

        <!-- QR Code -->
        <div class="mt-6 lg:mt-0 lg:col-span-5 lg:flex justify-center items-center">
            <div class="text-center">
                <img src="assets/qrcode.png" alt="QR Code" class="w-48 h-48 border-4 border-green-600 p-2 rounded-lg mx-auto">
                <p class="mt-2 text-gray-600">Scan QR Code Pendaftaran</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 fade-in visible" style="background: linear-gradient(to right, #4caf50, #81c784) ;">
    <div class="container mx-auto text-center px-7">
        <h2 class="text-xl font-bold text-white mb-8">Download Brosur dan Rincian Pembayaran </h2>        
        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
            <a href="path/to/brosur.pdf" class="bg-white text-green-600 rounded-lg shadow-lg p-4 flex items-center justify-center transition hover:bg-green-100">
                <i class="fas fa-file-download mr-2"></i>
                Download Brosur
            </a>
            <a href="path/to/rincian-pendaftaran.pdf" class="bg-white text-green-600 rounded-lg shadow-lg p-4 flex items-center justify-center transition hover:bg-green-100">
                <i class="fas fa-file-download mr-2"></i>
                Rincian Pendaftaran
            </a>
        </div>
    </div>
</section>

<section class="bg-white py-12 p-2">
    <div class="container mx-auto px-4 ">
        <h2 class="text-xl font-bold text-center mb-8">Alur Pendaftaran Santri Baru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 text-center">

            <!-- Step 1 -->
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-white text-green-600 border-4 border-green-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                    1
                </div>
                <h3 class="text-xl font-semibold mb-2">Isi Form Pendaftaran</h3>
                <p>Calon santri mengisi seluruh form pendaftaran online dengan lengkap, termasuk data pribadi dan informasi pendidikan.</p>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-white text-green-600 border-4 border-green-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                    2
                </div>
                <h3 class="text-xl font-semibold mb-2">Download Bukti Pendaftaran</h3>
                <p>Setelah form terisi, unduh bukti pendaftaran dan tunggu admin menghubungi melalui WhatsApp untuk informasi lebih lanjut.</p>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-white text-green-600 border-4 border-green-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                    3
                </div>
                <h3 class="text-xl font-semibold mb-2">Konfirmasi Pembayaran</h3>
                <p>Lakukan konfirmasi pembayaran melalui transfer bank atau datang langsung ke pondok dengan membawa bukti pendaftaran.</p>
            </div>

            <!-- Step 4 -->
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-white text-green-600 border-4 border-green-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                    4
                </div>
                <h3 class="text-xl font-semibold mb-2">Pelunasan Pembayaran</h3>
                <p>Pelunasan biaya harus dilakukan sesuai jadwal yang ditentukan, baik melalui transfer bank atau di pondok.</p>
            </div>

            <!-- Step 5 -->
            <div class="flex flex-col items-center">
                <div class="w-16 h-16 bg-white text-green-600 border-4 border-green-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4">
                    5
                </div>
                <h3 class="text-xl font-semibold mb-2">Pertemuan Wali dan Penyerahan Santri</h3>
                <p>Wali santri menghadiri pertemuan di pondok dan santri secara resmi diserahkan untuk memulai pendidikan.</p>
            </div>

        </div>
    </div>
</section>


<!-- Section untuk WhatsApp -->
<section class="bg-green-600 py-8 p-3">
    <div class="container mx-auto text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Butuh Bantuan Lebih Lanjut?</h2>
        <p class="text-white mb-4">Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui WhatsApp.</p>
        <a href="https://wa.me/6285792336956" target="_blank" class="bg-white text-green-600 rounded-lg px-6 py-3 text-lg font-semibold transition duration-300 hover:bg-green-100">
            Hubungi Kami di WhatsApp
        </a>
    </div>
</section>

<section class="bg-white py-12 p-5">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">FAQ Pendaftaran Santri Baru</h2>

        <!-- FAQ Container -->
        <div class="space-y-4">

            <!-- FAQ 1 -->
            <div class="faq-item border-b-2 border-gray-300 pb-4">
                <button class="faq-question w-full text-left text-lg font-semibold text-green-600 focus:outline-none" onclick="toggleFAQ(1)">
                    1. Apa saja syarat pendaftaran?
                </button>
                <div id="faq-1" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="text-gray-700 mt-2">Syarat pendaftaran meliputi fotokopi akta kelahiran, fotokopi kartu keluarga, dan fotokopi rapor terakhir.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item border-b-2 border-gray-300 pb-4">
                <button class="faq-question w-full text-left text-lg font-semibold text-green-600 focus:outline-none" onclick="toggleFAQ(2)">
                    2. Bagaimana cara melakukan pembayaran?
                </button>
                <div id="faq-2" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="text-gray-700 mt-2">Pembayaran dapat dilakukan melalui transfer bank ke rekening yang ditentukan atau datang langsung ke pondok.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item border-b-2 border-gray-300 pb-4">
                <button class="faq-question w-full text-left text-lg font-semibold text-green-600 focus:outline-none" onclick="toggleFAQ(3)">
                    3. Apakah ada batas waktu pendaftaran?
                </button>
                <div id="faq-3" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="text-gray-700 mt-2">Pendaftaran dibuka dari Januari hingga Maret setiap tahunnya. Harap segera mendaftar sebelum kuota penuh.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item border-b-2 border-gray-300 pb-4">
                <button class="faq-question w-full text-left text-lg font-semibold text-green-600 focus:outline-none" onclick="toggleFAQ(4)">
                    4. Bagaimana cara mengkonfirmasi pendaftaran?
                </button>
                <div id="faq-4" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="text-gray-700 mt-2">Setelah pembayaran, kirimkan bukti pembayaran ke admin melalui WhatsApp atau datang langsung ke pondok untuk konfirmasi.</p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-item border-b-2 border-gray-300 pb-4">
                <button class="faq-question w-full text-left text-lg font-semibold text-green-600 focus:outline-none" onclick="toggleFAQ(5)">
                    5. Kapan waktu pertemuan wali santri?
                </button>
                <div id="faq-5" class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                    <p class="text-gray-700 mt-2">Pertemuan wali santri diadakan satu minggu sebelum santri resmi masuk ke pondok, detail waktu akan diberitahukan lebih lanjut.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<footer class="bg-green-800 text-white py-6 p-5 ">
    <div class="container mx-auto text-center">
        <p class="mb-2">&copy; 2024 PCN Boarding School. All Rights Reserved.</p>
        <p class="text-sm">Address: Jl. kH Wahab Hasbulloh Gg III Tambakberas, Jombang</p>
        <p class="text-sm">Phone: xxxx xxxx xxxx </p>
        <p class="text-sm">Email: psbppcn@gmail.com</p>

        <!-- Link to Google Maps -->
        <p class="text-sm mt-2">
            <a href="https://maps.app.goo.gl/mHipmcPpjD5VJUMh8" target="_blank" class="text-green-300 hover:underline">
                View Location on Google Maps
            </a>
        </p>

        <div class="flex justify-center space-x-4 mt-2">
            <a href="https://www.facebook.com" class="text-white hover:text-green-400" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.twitter.com" class="text-white hover:text-green-400" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" class="text-white hover:text-green-400" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</footer>



<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

     // Variable to track the currently opened FAQ
     let currentFAQ = null;

function toggleFAQ(faqNumber) {
    // Close the previously opened FAQ
    if (currentFAQ && currentFAQ !== faqNumber) {
        const previousFAQ = document.getElementById('faq-' + currentFAQ);
        previousFAQ.style.maxHeight = '0px';
    }

    // Toggle the clicked FAQ
    const currentElement = document.getElementById('faq-' + faqNumber);
    if (currentElement.style.maxHeight === '0px' || !currentElement.style.maxHeight) {
        currentElement.style.maxHeight = currentElement.scrollHeight + 'px';
        currentFAQ = faqNumber;
    } else {
        currentElement.style.maxHeight = '0px';
        currentFAQ = null;
    }
}
</script>

</body>
</html>

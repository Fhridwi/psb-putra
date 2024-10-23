<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPDB ONLINE || Pendaftaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/daftar.css">
</head>

<style>
    .custom-swal {
    font-size: 0.5rem; /* Adjust font size */
}
</style>

<body class="bg-gray-100">

<header class="shadow fixed top-0 left-0 w-full z-50 navbar bg-white">
    <nav class="container mx-auto flex items-center justify-between py-4">
        <a href="#">
            <img src="assets/logo-j.png" alt="logo" class="w-36 md:w-64">
        </a>
        <div class="flex items-center space-x-6">
            <div class="hidden lg:flex space-x-6 font-bold text-[14px] menu" id="menu">
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-home"></i> Home</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-file-alt"></i> Syarat</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-road"></i> Alur</a>
                <a class="text-gray-600 hover:text-green-600 transition" href="#"><i class="fas fa-info-circle"></i> Informasi</a>
            </div>
            <a href="daftar.php" class="hidden lg:block px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-lg transition">Daftar</a>
            <button id="menu-btn" class="block lg:hidden focus:outline-none ml-2" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    <!-- Dropdown Menu -->
    <div id="dropdownMenu" class="hidden bg-white shadow-md rounded-lg absolute top-16 right-0 w-48">
        <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="index.php"><i class="fas fa-home"></i> Home</a>
        <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-file-alt"></i> Syarat</a>
        <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-road"></i> Alur</a>
        <a class="block px-4 py-2 text-gray-600 hover:bg-green-100" href="#"><i class="fas fa-info-circle"></i> Informasi</a>
    </div>
</header>


    <main class="container mx-auto mt-20 p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Form Pendaftaran Santri</h2>
        <div class="flex justify-center mb-4">
    <div class="flex space-x-2">
    <div id="step1" class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 text-white">1</div>
<div id="step2" class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 text-white">2</div>
<div id="step3" class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 text-white">3</div>

    </div>
</div>


        
        <form id="registrationForm" action="proses_data.php" method="POST" enctype="multipart/form-data">
            <!-- Step 1: Data Santri -->
            <div class="step">
                <h3 class="text-xl font-semibold mb-3 bg-green-100 p-2 rounded">Data Santri:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user mr-2"></i>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <input type="number" id="tanggal" name="tanggal" placeholder="Tanggal" min="1" max="31" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                        </div>
                        <div class="flex items-center">
                            <input type="number" id="bulan" name="bulan" placeholder="Bulan" min="1" max="12" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                        </div>
                        <div class="flex items-center">
                            <input type="number" id="tahun" name="tahun" placeholder="Tahun" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-venus-mars mr-2"></i>
                        <select id="jenis_kelamin" name="jenis_kelamin" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                            <option value="" disabled selected hidden>Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-school mr-2"></i>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                </div>
            </div>

            <!-- Step 2: Data Orang Tua -->
            <div class="step hidden">
                <h3 class="text-xl font-semibold mb-3 bg-green-100 p-2 rounded">Data Orang Tua:</h3>
                <h4 class="text-lg font-semibold mb-2">Data Ayah:</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-circle mr-2"></i>
                        <input type="text" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-briefcase mr-2"></i>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-money-bill-wave mr-2"></i>
                        <input type="text" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="Penghasilan Ayah" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        <select id="status_ayah" name="status_ayah" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                            <option value="" disabled selected hidden>Status</option>
                            <option value="hidup">Hidup</option>
                            <option value="meninggal">Meninggal</option>
                        </select>
                    </div>
                </div>
                <h4 class="text-lg font-semibold mb-2">Data Ibu:</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-circle mr-2"></i>
                        <input type="text" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-briefcase mr-2"></i>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-money-bill-wave mr-2"></i>
                        <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="Penghasilan Ibu" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        <select id="status_ibu" name="status_ibu" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full">
                            <option value="" disabled selected hidden>Status</option>
                            <option value="hidup">Hidup</option>
                            <option value="meninggal">Meninggal</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Step 3: Data Wali dan Dokumen Pendukung -->
            <div class="step hidden">
                <h3 class="text-xl font-semibold mb-3 bg-green-100 p-2 rounded">Data Wali:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-user-circle mr-2"></i>
                        <input type="text" id="nama_wali" name="nama_wali" placeholder="Nama Wali" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-briefcase mr-2"></i>
                        <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" placeholder="Pekerjaan Wali" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-money-bill-wave mr-2"></i>
                        <input type="text" id="penghasilan_wali" name="penghasilan_wali" placeholder="Penghasilan Wali" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-home mr-2"></i>
                        <input type="text" id="alamat_wali" name="alamat_wali" placeholder="Alamat Wali" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-phone mr-2"></i>
                        <input type="text" id="nomor_wa" name="nomor_wa" placeholder="Nomor WA" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
                    </div>
                </div>

                <h3 class="text-xl font-semibold mb-3 bg-green-100 p-2 rounded">Dokumen Pendukung:</h3>
<div class="grid grid-cols-1 gap-4">
    <div class="flex items-center mb-4">
        <i class="fas fa-camera mr-2"></i>
        <input type="file" id="pas_foto" name="pas_foto" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
        <span class="text-sm text-gray-500">Pas foto berpeci hitam</span>
    </div>
    <div class="flex items-center mb-4">
        <i class="fas fa-file-upload mr-2"></i>
        <input type="file" id="scan_kk" name="scan_kk" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
        <span class="text-sm text-gray-500">Scan Kartu Keluarga</span>
    </div>
    <div class="flex items-center mb-4">
        <i class="fas fa-file-upload mr-2"></i>
        <input type="file" id="scan_ktp_ortu" name="scan_ktp_ortu" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
        <span class="text-sm text-gray-500">Scan KTP Orang Tua</span>
    </div>
    <div class="flex items-center mb-4">
        <i class="fas fa-file-upload mr-2"></i>
        <input type="file" id="scan_akta" name="scan_akta" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
        <span class="text-sm text-gray-500">Scan Akte</span>
    </div>
    <div class="flex items-center mb-4">
        <i class="fas fa-file-upload mr-2"></i>
        <input type="file" id="scan_skl" name="scan_skl" required class="mt-1 p-2 border-b border-gray-300 focus:outline-none focus:border-green-600 w-full" />
        <span class="text-sm text-gray-500">Scan Surat Keterangan Lulus</span>
    </div>
</div>

            </div>

            <div class="flex justify-between mt-4">
                <button type="button" id="prevBtn" class="hidden px-6 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Kembali</button>
                <button type="button" id="nextBtn" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Selanjutnya</button>
            </div>
        </form>
    </main>

    <script>
let currentStep = 0;

function showStep(step) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((s, index) => {
        s.classList.toggle('hidden', index !== step);
    });

    document.getElementById('prevBtn').classList.toggle('hidden', step === 0);
    
    const nextBtn = document.getElementById('nextBtn');
    nextBtn.textContent = step === 2 ? 'Kirim' : 'Selanjutnya';

    document.getElementById('submitBtn').classList.toggle('hidden', step !== steps.length - 1);
    
    // Update step indicators
    const stepElements = [document.getElementById('step1'), document.getElementById('step2'), document.getElementById('step3')];
    
    // Update background color based on input validation
    stepElements.forEach((el, index) => {
        el.classList.toggle('bg-green-600', index < step || (index === 1 && validateInputs()));
        el.classList.toggle('bg-gray-300', index >= step);
        el.classList.add('text-white'); 
    });
}

function validateInputs() {
    const inputs = document.querySelectorAll('.step:not(.hidden) input[required], .step:not(.hidden) select[required]');
    let valid = true;
    inputs.forEach(input => {
        const isEmpty = !input.value;
        valid = valid && !isEmpty;
        input.classList.toggle('border-red-500', isEmpty);
    });
    return valid;
}

document.getElementById('nextBtn').addEventListener('click', () => {
    if (validateInputs()) {
        if (currentStep < 2) {
            currentStep++;
            showStep(currentStep);
        } else {
            // Show confirmation before submission
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengirim data?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
                width: '300px',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('registrationForm').submit();
                }
            });
        }
    } else {
        Swal.fire({
            title: 'Perhatian!',
            text: 'Lengkapi semua kolom.',
            icon: 'warning',
            confirmButtonText: 'OK',
            width: '200px',
            customClass: { popup: 'custom-swal' }
        });
    }
});

document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
});

document.getElementById('menu-btn').addEventListener('click', () => {
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden');
});

// Close dropdown when clicking outside
document.addEventListener('click', (event) => {
    const dropdownMenu = document.getElementById('dropdownMenu');
    const menuButton = document.getElementById('menu-btn');

    if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
});

// Initial display
showStep(currentStep);

</script>

</body>
</html>

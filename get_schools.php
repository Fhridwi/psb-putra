<?php
require 'config/koneksi.php';

if (isset($_GET['jenjang_id'])) {
    $jenjangId = $_GET['jenjang_id'];
    $schoolOptions = '';

    // Ambil data sekolah berdasarkan jenjang
    $querySchools = "SELECT * FROM sekolah WHERE jenjang_id = '$jenjangId'"; // Sesuaikan dengan nama kolom dan tabel
    $resultSchools = mysqli_query($conn, $querySchools);

    while ($row = mysqli_fetch_assoc($resultSchools)) {
        $schoolOptions .= "<option value=\"{$row['id']}\">{$row['nama']}</option>";
    }

    echo $schoolOptions; 
}
?>

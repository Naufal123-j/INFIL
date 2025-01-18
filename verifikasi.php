<?php
include('config.php'); // Pastikan file ini mengatur koneksi database dengan PDO

$err     = "";
$sukses  = "";

// Cek apakah email dan kode ada
if (isset($_GET['email']) && isset($_GET['kode'])) {
    $email = $_GET['email'];
    $kode = $_GET['kode'];

    // Debugging: Tampilkan nilai email dan kode
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Kode: " . htmlspecialchars($kode) . "<br>";

    // Lanjutkan dengan proses verifikasi
    include "db_koneksi.php"; // Pastikan koneksi database sudah benar

    $sql = "SELECT * FROM members WHERE email = ? AND status = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ss", $email, $kode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Proses verifikasi berhasil
        echo "Verifikasi berhasil! Akun Anda telah diaktifkan.";
    } else {
        echo "Verifikasi gagal! Data tidak ditemukan.";
    }
} else {
    echo "Data yang diperlukan untuk verifikasi tidak tersedia.";
}
?>
<h3>Halaman Verifikasi</h3>
<?php if($err) { echo "<div class='error'>$err</div>";}?>
<?php if($sukses) { echo "<div class='sukses'>$sukses</div>";}?>
?>

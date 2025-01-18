<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        // Cek apakah email ada di database
        $stmt = $conn->prepare("SELECT * FROM members WHERE email = :email");
        $stmt->execute(['email' => $email]);

        // Ambil data pengguna
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Periksa apakah akun sudah aktif
            if ($user['is_active'] != 1) {
                echo "<p style='color: red;'>Akun Anda belum aktif. Silakan verifikasi email Anda terlebih dahulu.</p>";
                exit;
            }

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Login berhasil, simpan data pengguna ke session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                echo "<p style='color: green;'>Login berhasil! Mengarahkan Anda ke halaman dashboard...</p>";
                header("Location: dashboard.php"); // Ganti dengan halaman tujuan setelah login
                exit;
            } else {
                echo "<p style='color: red;'>Password salah. Silakan coba lagi.</p>";
            }
        } else {
            echo "<p style='color: red;'>Email tidak ditemukan. Silakan daftar terlebih dahulu.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Terjadi kesalahan: " . $e->getMessage() . "</p>";
    }
}
?>

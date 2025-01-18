<?php
include('config.php'); // Pastikan file config mengatur koneksi PDO dengan benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $errors = [];

    // Cek apakah data kosong
    if (empty($username)) {
        $errors[] = "Nama pengguna tidak boleh kosong.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password minimal harus memiliki 6 karakter.";
    }

    // Jika ada error, tampilkan pesan dan hentikan eksekusi
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        exit;
    }

    try {
        // Cek apakah email sudah terdaftar
        $checkEmail = $conn->prepare("SELECT * FROM members WHERE email = :email");
        $checkEmail->execute(['email' => $email]);

        if ($checkEmail->rowCount() > 0) {
            echo "<p style='color: red;'>Email sudah terdaftar! Silakan gunakan email lain.</p>";
            exit;
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Masukkan data ke dalam database
        $sql = "INSERT INTO members (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        echo "<p style='color: green;'>Pendaftaran berhasil! Silakan <a href='masuk.php'>login</a>.</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Terjadi kesalahan: " . $e->getMessage() . "</p>";
    }
}
?>

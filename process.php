<?php
// Memasukkan file koneksi database
include("db_koneksi.php");

// Cek apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi kata sandi

  // Query untuk menyimpan data ke database
  $sql = "INSERT INTO members (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil. <a href='index.php'>Kembali ke Halaman Utama</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

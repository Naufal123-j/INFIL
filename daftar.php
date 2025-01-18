<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR</title>
    <link rel="stylesheet" href="./inc/css/daftar.css">
</head>

<?php 
if(isset($_SESSION['members_email']) != ''){ //sudah dalam keadaan login
    header("location:index.php");
    exit();
}
?>

<?php
include "db_koneksi.php";
include "config.php";

$email          = "";
$username       = "";
$err            = "";
$sukses         = "";

if(isset($_POST['register'])){
    $email                  = $_POST['email'];
    $username               = $_POST['username'];
    $password               = $_POST['password'];
    $konfirmasi_password     = $_POST['konfirmasi_password'];

    // Debugging input
    var_dump($email, $username, $password, $konfirmasi_password);

    if(empty($email) || empty($username) || empty($password) || empty($konfirmasi_password)){
        $err .= "<li>Silakan masukkan semua isian.</li>";
    }

    // Cek di bagian db, apakah email sudah ada atau belum
    if(!empty($email)){
        $sql1   = "SELECT email FROM members WHERE email = ?";
        $stmt = $koneksi->prepare($sql1);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $err .= "<li>Email yang kamu masukkan sudah terdaftar.</li>";
        }

        // Validasi email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err .= "<li>Email yang kamu masukkan tidak valid.</li>";
        }
    }

    // Cek kesesuaian password & konfirmasi password
    if($password != $konfirmasi_password){
        $err .= "<li>Password dan Konfirmasi Password tidak sesuai.</li>";
    }
    if(strlen($password) < 6){
        $err .= "<li>Panjang karakter yang diizinkan untuk password paling tidak 6 karakter.</li>";
    }

    // Debugging error
    if(!empty($err)){
        echo "Errors: ";
        var_dump($err);
    }

    if(empty($err)){
        $status             = md5(rand(0,1000));
        $judul_email        = "Halaman Konfirmasi Pendaftaran";
        $isi_email          = "Akun yang kamu miliki dengan email <b>$email</b> telah siap digunakan.<br/>";
        $isi_email          .= "Sebelumnya silakan melakukan aktifasi email di link di bawah ini:<br/>";
        $isi_email          .= url_dasar()."proses_login.php?email=".urlencode($email)."&kode=".urlencode($status);

        // Kirim email
        $email_sent = kirim_email($email, $username, $judul_email, $isi_email);

        // Debugging setelah mengirim email
        if ($email_sent) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }

        // Gunakan prepared statement untuk menghindari SQL injection
        $sql1 = "INSERT INTO members (email, username, password, status) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql1);
        $hashed_password = md5($password); // Hash password
        $stmt->bind_param("ssss", $email, $username, $hashed_password, $status);
        
        // Debugging sebelum eksekusi query
        echo "Preparing to insert: ";
        var_dump($email, $username, $hashed_password, $status);
        
        if($stmt->execute()){
            $sukses = "Proses Berhasil. Silakan cek email kamu untuk verifikasi.";
        } else {
            $err .= "<li>Gagal menyimpan data: " . $stmt->error . "</li>";
            // Debugging error query
            echo "Query Error: " . $stmt->error;
        }
    }
}
?>

<?php if ($err): ?>
    <div class="error"><ul><?php echo $err; ?></ul></div>
<?php endif; ?>

<?php if ($sukses): ?>
    <div class="sukses"><?php echo $sukses; ?></div>
<?php endif; ?>

<div class="container">
    <a href="index.php" class="back-button">Kembali</a>
    <div class="form-wrapper">
        <h1 class="form-title">DAFTAR</h1>
        <form action="proses_daftar.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" value="<?php echo $email; ?>" required />

            <label for="username">Nama Lengkap</label>
            <input type="text" id="username" name="username" placeholder="Masukkan nama lengkap" value="<?php echo $username; ?>" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required />

            <label for="konfirmasi_password">Konfirmasi Password</label>
            <input type="password" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi password" required />

            <button type="submit" class="submit-button">Masuk</button>
            <button type="button" class="google-button">Masuk dengan google</button>
        </form>
    </div>
</div>
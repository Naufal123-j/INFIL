<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MASUK</title>
    <link rel="stylesheet" href="./inc/css/masuk.css">
</head>

<?php
include "inc/inc_koneksi.php";

$email      = "";
$password   = "";
$err        = "";

if(isset($_POST['login'])){
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if($email == '' or $password == ''){
        $err .= "<li>Silakan masukkan semua isian</li>";
    }else{
        $sql1   = "SELECT * FROM members WHERE email = '$email'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($r1['status'] != '1' && $n1 > 0){
            $err .= "<li>Akun yang kamu miliki belum aktif</li>";
        }

        if($r1['password'] != md5($password) && $n1 >0 && $r1['status'] == '1'){
            $err .= "<li>Password tidak sesuai</li>";
        }

        if($n1 < 1){
            $err .= "<li>Akun tidak ditemukan</li>";
        }

        if(empty($err)){
            $_SESSION['members_email'] = $email;
            $_SESSION['members_username'] = $r1['username'];
            
            header("location:rahasia.php");
            exit();
        }
    }
}
?>

<?php if ($err) { echo "<div class='error'><ul class='pesan'>$err</ul></div>"; } ?>
<div class="container">
    <a href="index.php" class="back-button">Kembali</a>
    <div class="form-wrapper">
        <h1 class="form-title">MASUK</h1>
        <form class="form" action="dashboard.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="masukan email anda" value="<?php echo htmlspecialchars($email); ?>" required />

            <label for="password">Kata sandi</label>
            <input type="password" id="password" name="password" placeholder="masukan kata sandi anda" required />

            <a href="#" class="forgot-password">Lupa kata sandi</a>

            <button type="submit" name="login" class="submit-button">Masuk</button>
            <button type="button" class="google-button">Masuk dengan google</button>
        </form>
    </div>
</div>

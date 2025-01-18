<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFIL - Landing Page</title>
    <link rel="stylesheet" href="./inc/css/dashboard.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            
            <button class="menu-toggle" id="close-sidebar">«</button>
            <div class="profile-section">
                <div class="profile-picture">
                    <img src="https://via.placeholder.com/50" alt="Profile Picture">
                </div>
                <h3>Akun Anda</h3>
                <p>Alamat email anda</p>
            </div>
            <div class="menu-section">
                <div class="menu-item">Laporan Belajar</div>
                <div class="menu-item">Pengaturan</div>
                <div class="menu-item" href="index.php">Keluar</div>
                <div class="menu-item">Bantuan</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="dashboard-content">
            <button class="menu-toggle" id="open-sidebar">☰</button>
                <h2>Mau belajar apa hari ini?</h2>
                <p>Klik bagian tubuh yang ingin kamu ketahui</p>
                <div class="figure-container">
                    <img src="./inc/gambar/Anatomy Full Body/Depan Full body.png" alt="Gambar Tubuh Manusia">

                    <div class="interactive-point point-head" title="Belajar Kepala"></div>
                    <div class="interactive-point point-arm-left" title="Belajar Lengan Kiri"></div>
                    <div class="interactive-point point-arm-right" title="Belajar Lengan Kanan"></div>
                    <div class="interactive-point point-leg-left" title="Belajar Kaki Kiri"></div>
                    <div class="interactive-point point-leg-right" title="Belajar Kaki Kanan"></div>
                </div>
                <button class="btn-footer" id="footer-btn">Masuk kepada materi dan pembahasan</button>
            </div>
        </div>
    </div>

    <!-- Popup -->
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h3>Pilih tingkat kesulitan</h3>
        <button class="level-button">Mudah</button>
        <button class="level-button">Sedang</button>
        <button class="level-button">Sulit</button>
        <button class="close-popup" id="close-popup">X</button>
    </div>
    <script src="sidebar.js"></script>
    <script src="script.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>
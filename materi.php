<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Anatomi</title>
    <link rel="stylesheet" href="./inc/css/materi.css">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <button class="back-btn" onclick="window.history.back()">« Kembali</button>
            <h1 id="materi-title">Materi Bagian Tubuh</h1>
        </header>

        <!-- Konten Materi -->
        <div class="content">
            <!-- Gambar Bagian Tubuh -->
            <div class="image-section">
                <img src="/inc/gambar/Anatomy Full Body/Depan Full body.png" alt="Gambar Bagian Tubuh" id="materi-image">
            </div>

            <!-- Deskripsi Materi -->
            <div class="materi-text">
                <h2 id="materi-subtitle">Judul Materi</h2>
                <p id="materi-description">Deskripsi Materi</p>
            </div>

            <!-- Kontrol Zoom -->
            <div class="zoom-controls">
                <button id="zoom-out">Zoom out</button>
                <button id="zoom-in">Zoom in</button>
            </div>
        </div>
    </div>

    <script src="materi.js"></script>
</body>

</html>

<?php
if (isset($_FILES['file']['name']) && $_FILES['file']['name']) {
    if (!$_FILES['file']['error']) {
        // Validasi dan sanitasi nama file
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif']; // Daftar ekstensi yang diperbolehkan
        $file_info = pathinfo($_FILES['file']['name']);
        $ext = strtolower($file_info['extension']); // Mendapatkan ekstensi file

        if (in_array($ext, $allowed_extensions)) {
            $name = md5(rand(100, 200)); // Membuat nama file acak
            $filename = $name . '.' . $ext;
            $destination = '../gambar/' . $filename; // Direktori tujuan
            $location = $_FILES['file']['tmp_name'];

            if (move_uploaded_file($location, $destination)) {
                echo '../gambar/' . $filename; // URL file berhasil diunggah
            } else {
                echo 'Gagal memindahkan file ke direktori tujuan.';
            }
        } else {
            echo 'Ekstensi file tidak diizinkan. Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.';
        }
    } else {
        echo 'Oops! Terjadi kesalahan saat mengunggah file: ' . $_FILES['file']['error'];
    }
} else {
    echo 'Tidak ada file yang diunggah.';
}
?>

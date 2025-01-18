// Ambil elemen
const btnBack = document.getElementById('back-btn');
const zoomIn = document.getElementById('zoom-in');
const zoomOut = document.getElementById('zoom-out');
const bodyImage = document.getElementById('body-image');
const materiText = document.getElementById('materi-text');
const labelPoint = document.getElementById('label-point');

// Navigasi kembali
btnBack.addEventListener('click', () => {
    window.location.href = "dashboard.php"; // Ganti dengan URL halaman dashboard Anda
});

// Fungsi Zoom
let scale = 1;

zoomIn.addEventListener('click', () => {
    if (scale < 2) { // Batas zoom maksimal
        scale += 0.1;
        bodyImage.style.transform = `scale(${scale})`;
    }
});

zoomOut.addEventListener('click', () => {
    if (scale > 0.5) { // Batas zoom minimal
        scale -= 0.1;
        bodyImage.style.transform = `scale(${scale})`;
    }
});

// Data Materi
const materiData = {
    kepala: {
        title: "Materi: Kepala",
        image: "./inc/gambar/Kepala/Kepala.png", // Ganti dengan URL gambar kepala
        description: `
            Kepala merupakan bagian tubuh manusia yang berfungsi sebagai pusat kendali utama tubuh. 
            Di dalam kepala terdapat otak, mata, hidung, telinga, dan mulut.
        `,
    },
    lenganKanan: {
        title: "Materi: Lengan Kanan",
        image: "https://via.placeholder.com/300", // Ganti dengan URL gambar lengan kanan
        description: `
            Lengan kanan sering digunakan untuk aktivitas seperti menulis, mengangkat benda, atau pekerjaan yang membutuhkan ketelitian.
        `,
    },
    lenganKiri: {
        title: "Materi: Lengan Kiri",
        image: "https://via.placeholder.com/300", // Ganti dengan URL gambar lengan kiri
        description: `
            Lengan kiri berperan sebagai pendukung lengan kanan. Pada orang bertangan kiri, lengan kiri lebih dominan.
        `,
    },
    kakiKanan: {
        title: "Materi: Kaki Kanan",
        image: "https://via.placeholder.com/300", // Ganti dengan URL gambar kaki kanan
        description: `
            Kaki kanan sering menjadi kaki dominan untuk aktivitas seperti menendang bola atau menjaga keseimbangan.
        `,
    },
    kakiKiri: {
        title: "Materi: Kaki Kiri",
        image: "https://via.placeholder.com/300", // Ganti dengan URL gambar kaki kiri
        description: `
            Kaki kiri mendukung aktivitas kaki kanan dan dapat menjadi kaki dominan bagi orang yang lebih sering menggunakannya.
        `,
    },
};

// Muat Materi Berdasarkan URL Parameter
const urlParams = new URLSearchParams(window.location.search);
const materi = urlParams.get("materi");

if (materi && Object.keys(materiData).includes(materi)) {
    document.getElementById("materi-title").innerText = materiData[materi].title;
    document.getElementById("materi-subtitle").innerText = materiData[materi].title;
    document.getElementById("materi-image").src = materiData[materi].image;
    document.getElementById("materi-description").innerHTML = materiData[materi].description;

    // Fallback jika gambar gagal dimuat
    document.getElementById("materi-image").onerror = () => {
        document.getElementById("materi-image").src = "https://via.placeholder.com/300";
    };
} else {
    document.getElementById("materi-title").innerText = "Materi Tidak Ditemukan";
    document.getElementById("materi-description").innerText = "Maaf, materi yang Anda cari tidak tersedia.";
}

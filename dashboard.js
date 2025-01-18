document.querySelectorAll(".interactive-point").forEach((point) => {
    point.addEventListener("click", () => {
        const materi = point.classList[1].split("-")[1]; // Ambil bagian tubuh dari class
        window.location.href = `materi.php?materi=${materi}`;
    });
});

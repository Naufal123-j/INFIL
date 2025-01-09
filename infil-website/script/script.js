// Menambahkan log interaksi
console.log('Welcome to Infil!');

document.getElementById('startButton').addEventListener('click', function() {
    alert('Welcome to the anatomy lesson!'); // Placeholder for functionality
  });

  // Pilih semua pointer
const pointers = document.querySelectorAll('.pointer');

// Tambahkan event listener pada masing-masing pointer
pointers.forEach(pointer => {
  pointer.addEventListener('click', (event) => {
    const targetId = event.target.id;
    switch (targetId) {
      case 'pointer-head':
        alert('Anda memilih bagian kepala.');
        break;
      case 'pointer-hand-left':
        alert('Anda memilih tangan kiri.');
        break;
      case 'pointer-hand-right':
        alert('Anda memilih tangan kanan.');
        break;
      default:
        alert('Bagian tidak dikenal.');
    }
  });
});

// Toggle Sidebar
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');

menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Show Popup
const footerBtn = document.getElementById('footer-btn');
const popup = document.getElementById('popup');
const overlay = document.getElementById('overlay');
const closePopup = document.getElementById('close-popup');

footerBtn.addEventListener('click', () => {
    popup.classList.add('active');
    overlay.classList.add('active');
});

closePopup.addEventListener('click', () => {
    popup.classList.remove('active');
    overlay.classList.remove('active');
});

overlay.addEventListener('click', () => {
    popup.classList.remove('active');
    overlay.classList.remove('active');
});
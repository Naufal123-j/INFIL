
 // Popup Logic
 const overlay = document.getElementById('overlay');
 const popup = document.getElementById('popup');
 const footerBtn = document.getElementById('footer-btn');
 const closePopup = document.getElementById('close-popup');

 footerBtn.addEventListener('click', () => {
     overlay.style.display = 'block';
     popup.style.display = 'block';
 });

 closePopup.addEventListener('click', () => {
     overlay.style.display = 'none';
     popup.style.display = 'none';
 });

 overlay.addEventListener('click', () => {
     overlay.style.display = 'none';
     popup.style.display = 'none';
 });
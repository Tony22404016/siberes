

// JavaScript untuk mengontrol sidebar mobile
const hamburger = document.getElementById('hamburger');
const mobileSidebar = document.getElementById('mobileSidebar');
const closeSidebar = document.getElementById('closeSidebar');
const overlay = document.getElementById('overlay');

// Buka sidebar saat hamburger diklik
hamburger.addEventListener('click', () => {
    mobileSidebar.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden'; // Mencegah scroll di body
});

// Tutup sidebar saat tombol close diklik
closeSidebar.addEventListener('click', () => {
    mobileSidebar.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = ''; // Mengembalikan scroll di body
 });

// Tutup sidebar saat overlay diklik
overlay.addEventListener('click', () => {
    mobileSidebar.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = ''; // Mengembalikan scroll di body
});

//search input
function filterProducts() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.product-card');

    cards.forEach(card => {
        const productName = card.querySelector('.product-name').textContent.toLowerCase();

        if (productName.includes(searchInput)) {
            card.style.display = "";   // tampilkan
        } else {
            card.style.display = "none"; // sembunyikan
        }
    });
}
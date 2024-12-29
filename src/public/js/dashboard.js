// Fungsi untuk menampilkan/menyembunyikan menu
function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
}

// Sembunyikan menu jika pengguna mengklik di luar ikon atau menu
window.addEventListener('click', function (e) {
    const menu = document.getElementById('menu');
    const profileMenu = document.querySelector('.profile-menu');
    if (!profileMenu.contains(e.target)) {
        menu.style.display = 'none';
    }
});

// Fungsi untuk membuka modal dan mengatur kategori secara dinamis
function openModal(title) {
    // Ambil elemen input hidden untuk kategori
    const kategoriInput = document.getElementById('kategori-input');

    // Set nilai kategori ke input hidden
    kategoriInput.value = title.toLowerCase();

    // Debug log untuk memastikan nilai kategori
    console.log(`Kategori diatur: ${kategoriInput.value}`);

    // Atur judul modal
    document.getElementById('modal-title').innerText = `Submit ${title}`;

    // Tampilkan modal
    document.getElementById('modal').style.display = "block";
}

// Fungsi untuk menutup modal
function closeModal() {
    document.getElementById('modal').style.display = "none";
}

// Tambahkan event listener untuk form submit
document.getElementById('submit-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Mencegah reload halaman

    const form = event.target;

    // Kirim data form menggunakan Fetch API
    fetch(form.action, {
        method: form.method,
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
        .then(response => {
            if (response.ok) {
                // Tampilkan modal notifikasi sukses
                document.getElementById('success-modal').style.display = "block";

                // Tutup modal submit
                document.getElementById('modal').style.display = "none";

                // Bersihkan input file setelah submit
                form.reset();
            } else {
                alert("Error submitting the proof!");
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert("Something went wrong!");
        });
});

// Fungsi untuk menutup modal notifikasi sukses
function closeSuccessModal() {
    document.getElementById('success-modal').style.display = "none";
    window.location.reload(); // Reload halaman setelah modal notifikasi ditutup
}

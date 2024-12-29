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

function openModal(title) {
    const form = document.getElementById('submit-form');
    form.action = `/dashboard/{{ $mahasiswa->id }}/submit/${title.toLowerCase()}`; // Set kategori ke lowercase
    document.getElementById('modal-title').innerText = `Submit ${title}`;
    document.getElementById('modal').style.display = "block";
}

function closeModal() {
    document.getElementById('modal').style.display = "none";
}

document.getElementById('submit-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Mencegah reload halaman

    const form = event.target;

    // Simulasi pengiriman dengan Ajax (Opsional)
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
            } else {
                alert("Error submitting the proof!");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Something went wrong!");
        });
});

// Fungsi untuk menutup modal notifikasi
function closeSuccessModal() {
    document.getElementById('success-modal').style.display = "none";
    window.location.reload(); // Reload halaman setelah ditutup
}








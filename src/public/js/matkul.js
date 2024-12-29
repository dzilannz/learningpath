const mataKuliah = [
    { kode: 'MK001', nama: 'Pemrograman Dasar', sks: 3, status: 'Sudah Diambil' },
    { kode: 'MK002', nama: 'Matematika Diskrit', sks: 2, status: 'Belum Diambil' },
    { kode: 'MK003', nama: 'Bahasa Inggris', sks: 2, status: 'Sudah Diambil' },
    { kode: 'MK004', nama: 'Struktur Data', sks: 3, status: 'Belum Diambil' },
];

function renderTable(data) {
    const tableBody = document.getElementById('table-body');
    tableBody.innerHTML = '';

    if (data.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="4" class="empty-state">Tidak ada data tersedia.</td></tr>';
        return;
    }

    data.forEach((matkul) => {
        const row = `
            <tr>
                <td>${matkul.kode}</td>
                <td>${matkul.nama}</td>
                <td>${matkul.sks}</td>
                <td>${matkul.status}</td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function showTaken() {
    const taken = mataKuliah.filter((matkul) => matkul.status === 'Sudah Diambil');
    renderTable(taken);
}

function showNotTaken() {
    const notTaken = mataKuliah.filter((matkul) => matkul.status === 'Belum Diambil');
    renderTable(notTaken);
}

// Tampilkan semua data saat pertama kali dimuat
renderTable(mataKuliah);
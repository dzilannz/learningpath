const ctx1 = document.getElementById('statistikChart').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Mahasiswa Aktif', 'ibTitah', 'Kerja Praktik', 'Sidang'],
            datasets: [
                {
                    label: 'Sudah',
                    data: [100, 94, 50, 4],
                    backgroundColor: '#FFC107',
                },
                {
                    label: 'Belum',
                    data: [15, 21, 65, 30],
                    backgroundColor: '#000',
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { labels: { font: { size: 10 } } }
            }
        }
    });

const ctx2 = document.getElementById('ibtitahChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Ibadah', 'Tilawah', 'Tahfidz'],
            datasets: [{
                data: [60, 70, 30],
                backgroundColor: ['#FFC107', '#FFD54F', '#FFE082'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

const ctx3 = document.getElementById('sidangChart').getContext('2d');
    new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: ['Sempro', 'Kompre', 'Kolokium', 'Munaqasyah'],
            datasets: [{
                data: [30, 15, 10, 5],
                backgroundColor: ['#FFC107', '#FFD54F', '#FFE082', '#FFF8E1'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            }
        }
});
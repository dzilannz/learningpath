<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FAFAFA;
            display: flex;
        }

        .header {
            width: 100%;
            height: 72px;
            background-color: #FFFFFF;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 50px;
            margin-right: 20px;
        }

        .header .menu-text {
            display: flex;
            flex-direction: column; /* Teks akan ditampilkan vertikal */
            text-align: left;
          }
          
        .header .menu-text .line1 {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
          
        .header .menu-text .line2 {
            font-size: 16px;
            font-weight: bold;
            color: #000; /* Warna teks berbeda jika diinginkan */
        }
        .header .menu {
            display: flex;
            align-items: center;
        }

        .header i {
            margin-left: 40px ;
            font-size: 20px;
            color: #000;
        }

        .header .text-text {
            margin-left: 40px;
            font-size: 24px;
            font-weight: bold;
            color: rgba(57, 60, 77, 1);
        }

        .header .profile {
            margin-right: 20px;
        }

        .header .profile i {
            font-size: 35px;
        }

        .sidebar {
            position: fixed;
            top: 72px;
            left: 0;
            width: 240px;
            height: calc(100vh - 72px);
            background-color: #FFFFFF;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }

        .sidebar .menu-item {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: #394D4D;
            transition: background 0.3s;
        }

        .sidebar .menu-item:hover {
            background-color: #FFF574;
        }

        .sidebar .menu-item i {
            margin-right: 10px;
        }

        .dashboard {
            margin-left: 240px;
            margin-top: 92px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background-color: #FFFFFF;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 150px;
        }

        .card h3 {
            font-size: 16px;
            color: #333;
            margin-top: 10px;
            text-align: center;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin: auto;
        }

        .charts {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 20px;
        }

        .chart-box {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .chart-box canvas {
            max-width: 100%; 
            max-height: 250px;
        }

        .footer {
            margin-left: 240px;
            width: calc(100% - 240px);
            height: 72px;
            background-color: #FFFFFF;
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <span class="menu-text">
                <span class="line1">Student</span>
                <span class="line2">LearningPath</span>
            </span>
            <i class="fa fa-bars"></i>
            <span class="text-text">Dashboard</span>
        </div>
        <div class="profile">
            <a href="{{ route('admin.profile') }}">
                <i class="fa fa-user-circle"></i>
            </a>
        </div>
    </div>
    <div class="sidebar">
        <div>
            <a href="#" class="menu-item">Dashboard</a>
            <a href="#" class="menu-item">2024</a>
            <a href="#" class="menu-item">2023</a>
            <a href="#" class="menu-item">2022</a>
            <a href="#" class="menu-item">2021</a>
        </div>
        <div>
            <a href="{{ route('home') }}" class="menu-item"><i class="fa fa-sign-out-alt"></i> Log Out</a>
        </div>
    </div>
    <div class="dashboard">
        <div class="cards">
            <div class="card">
                <h3>Mahasiswa Aktif</h3>
                <p>120/130</p>
            </div>
            <div class="card">
                <h3>ibTitah</h3>
                <p>100/130</p>
            </div>
            <div class="card">
                <h3>Kerja Praktik</h3>
                <p>50/130</p>
            </div>
            <div class="card">
                <h3>Sidang</h3>
                <p>10/130</p>
            </div>
        </div>
        <div class="charts">
            <div class="chart-box">
                <h3>Statistik</h3>
                <canvas id="statistikChart"></canvas>
            </div>
            <div class="chart-box">
                <h3>Ibtitah</h3>
                <canvas id="ibtitahChart"></canvas>
            </div>
            <div class="chart-box">
                <h3>Sidang</h3>
                <canvas id="sidangChart"></canvas>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 Student LearningPath. Semua Hak Dilindungi.
    </div>
    <script>
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
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Learning Path</title>
    <link rel="stylesheet" href="/css/home.css">
    <script src="{{ asset('js/home.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('img/logoif.png') }}" alt="Logo" class="nav-logo">
            <div class="nav-text">
                <span class="nav-line">TEKNIK</span>
                <span class="nav-line">INFORMATIKA</span>
            </div>
        </div>
        <div class="navbar-right">
            <a href="#" class="nav-item">Home</a>
            <a href="#about" class="nav-item">About</a>
            <a href="{{ route('login.form') }}" class="nav-item">Login</a>
        </div>
    </nav>

    <header class="header">
        <div class="header-content">
            <h1 class="title">
                Student<br>Learning Path
            </h1>
            <p class="subtitle">Lihat perjalanan akademikmu dengan mudah!</p>
            <button class="btn" onclick="scrollToSection()">View More</button>
        </div>
    </header>

    <section id="target-section" class="stats-section">
        <div class="stats-card">
            <h3 class="stats-title">Mahasiswa Aktif</h3>
            <p class="stats-value">345</p>
        </div>
        <div class="stats-card">
            <h3 class="stats-title">Ibtitah</h3>
            <p class="stats-value">256</p>
        </div>
        <div class="stats-card">
            <h3 class="stats-title">Kerja Praktek</h3>
            <p class="stats-value">189</p>
        </div>
        <div class="stats-card">
            <h3 class="stats-title">Sidang</h3>
            <p class="stats-value">176</p>
        </div>
    </section>

    <section class="chart-section">
        <div class="filter-container">
            <button class="filter-btn" id="filter-button" onclick="toggleDropdown()">All</button>
            <div id="filter-dropdown" class="filter-dropdown hidden">
                <div onclick="filterData('all')">All</div>
                <div onclick="filterData('2024')">2024</div>
                <div onclick="filterData('2023')">2023</div>
                <div onclick="filterData('2022')">2022</div>
            </div>
        </div>
        <div class="chart-container large-chart">
            <h3>Statistik</h3>
            <canvas id="statistikChart"></canvas>
        </div>
        <div class="chart-container small-chart">
            <h3>Ibtitah</h3>
            <canvas id="ibtitahChart"></canvas>
        </div>
        <div class="chart-container small-chart">
            <h3>TA & Sidang</h3>
            <canvas id="sidangChart"></canvas>
        </div>
    </section>
    

    <section id="about" class="about-section">
        <div class="about-container">
            <img src="{{ asset('img/v292_191.png') }}" alt="About Illustration" class="about-image">
            <div class="about-content">
                <h2 class="about-title">About</h2> <!-- Move heading outside the yellow box -->
                <div class="about-box">
                    <p>
                        Platform digital yang dirancang untuk membantu mahasiswa dalam melacak dan memahami perjalanan akademiknya. Kami hadir untuk membantu Anda tetap fokus pada tujuan dan memastikan Anda dapat mencapai potensi terbaik di setiap tahap perjalanan pendidikan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-section">
        <div class="footer-container">
            <div class="footer-left">
                <div class="logos">
                <img src="{{ asset('img/logoif.png') }}" alt="Logo 1" class="footer-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo 2" class="footer-logo">
                </div>
                <div class="footer-address">
                    <strong>Teknik Informatika</strong><br>
                    Universitas Islam Negeri Sunan Gunung Djati<br>
                    Jalan A.H Nasution No. 105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614
                </div>
            </div>
            <div class="footer-middle">
                <h3>Layanan Akademik</h3>
                <ul>
                    <li>Sistem Informasi Layanan Akademik (SALAM)</li>
                    <li>Learning Management System (LMS)</li>
                    <li>E-Library UIN Sunan Gunung Djati</li>
                    <li>E-Library Teknik Informatika</li>
                    <li>Jurnal Online Informatika</li>
                </ul>
            </div>
            <div class="footer-right">
                <h3>Akses Cepat</h3>
                <ul>
                    <li>Fakultas Sains Dan Teknologi</li>
                    <li>UIN Sunan Gunung Djati</li>
                    <li>SINTA Dikti Kemendikbud RI</li>
                    <li>Pangkalan Data DIKTI Kemendikbud RI</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Copyrights. All rights reserved. Dzilan Nazira Z.</p>
        </div>
    </footer>
</body>
</html>

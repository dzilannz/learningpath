<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dashboard.css">
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Student Learning Path</title>
</head>
<body>
    <!-- Header -->
    <div class="header-container">
        <div class="header">
            <div class="greeting">
                Halo, <span class="student-name">{{ $mahasiswa->nama }}</span>!
            </div>
            <div class="profile-menu">
                <i class="fa fa-user profile-icon" onclick="toggleMenu()"></i>
                <div class="menu" id="menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="title">Your Progress</div>
        
        <!-- Kuliah Section -->
        <div class="progress-section">
            <div class="label">
                <a href="/mata-kuliah" style="text-decoration: none; color: inherit;">Kuliah</a>
            </div>
                <div class="progress-bar">
                    @php 
                        $cumulativeSKS = 0; 
                    @endphp
                    @foreach ($semesters as $semester)
                        @php
                            $takenSKS = $takenSemesters->where('semester_id', $semester->id)->sum('sks_diambil');
                            if ($takenSKS > 0) $cumulativeSKS += $takenSKS;
                        @endphp
                        <div class="{{ $takenSKS > 0 ? 'completed' : '' }}">
                            <span class="tooltip">
                                {{ $semester->nama }}: {{ $takenSKS }} SKS <br>
                                Total: {{ $cumulativeSKS }} / 144 SKS
                            </span>
                        </div>
                    @endforeach
                </div>
        </div>


        <!-- Ibtitah Section -->
        <div class="progress-section">
            <div class="label">Ibtitah</div>
            <div class="progress-bar">
                 <div class="{{ $ibtitah->where('kategori', 'tilawah')->where('status', 'approved')->first() ? 'completed' : '' }}" onclick="openModal('Tilawah')">
                    <span class="circle"></span>
                    <span class="label">Tilawah</span>
                </div>
                <div class="{{ $ibtitah->where('kategori', 'tahfidz')->where('status', 'approved')->first() ? 'completed' : '' }}" onclick="openModal('Tahfidz')">
                    <span class="circle"></span>
                    <span class="label">Tahfidz</span>
                </div>
                <div class="{{ $ibtitah->where('kategori', 'ibadah')->where('status', 'approved')->first() ? 'completed' : '' }}" onclick="openModal('Ibadah')">
                    <span class="circle"></span>
                    <span class="label">Ibadah</span>
                </div>
            </div>
        </div>


        <!-- Sidang Section -->
        <div class="progress-section">
            <div class="label">Sidang</div>
            <div class="progress-bar">
                <div class="{{ $sidang->seminar_kp ? 'completed' : '' }}">
                    <span class="circle"></span>
                    <span class="label">Seminar KP</span>
                </div>
               <div class="{{ $sidang->sempro ? 'completed' : '' }}">
                    <span class="circle"></span>
                    <span class="label">Sempro</span>
                </div>
                <div class="{{ $sidang->kolokium ? 'completed' : '' }}">
                    <span class="circle"></span>
                    <span class="label">Kolokium</span>
                </div>
                <div class="{{ $sidang->kompre ? 'completed' : '' }}">
                    <span class="circle"></span>
                    <span class="label">Kompre</spa>
                </div>
                <div class="{{ $sidang->munaqasyah ? 'completed' : '' }}">
                    <span class="circle"></span>
                    <span class="label">Munaqasyah</span>
                </div>
            </div>
        </div>


       
    <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 id="modal-title">Submit Proof</h2>
                <form id="submit-form" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="proof_file" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

        <!-- Modal Notifikasi -->
        <div id="success-modal" class="modal">
            <div class="modal-content">
                <i class="fa fa-check-circle" style="color: #FFD523; font-size: 50px; margin-bottom: 10px;"></i>
                <h2>Proof submitted successfully!</h2>
                <button onclick="closeSuccessModal()">Close</button>
            </div>
        </div>



    <div class="footer">
        <p>&copy; 2024 Student LearningPath. Semua Hak Dilindungi.</p>
    </div>
</div>
</body>
</html>

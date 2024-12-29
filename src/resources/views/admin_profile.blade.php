<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
        <div class="header-section">
            <a href="{{ route('dashboard.admin') }}" class="back-btn">Back</a>
            <a href="{{ route('admin.ibtitah.form') }}" class="add-btn">Add</a>
        </div>
        <h2>Data Ibtitah</h2>
        @if ($ibtitahs->isEmpty())
            <p class="empty-state">No pending approvals available.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>File</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ibtitahs as $ibtitah)
                        <tr>
                            <td>{{ $ibtitah->mahasiswa->nama }}</td>
                            <td>{{ $ibtitah->mahasiswa->nim }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $ibtitah->file_path) }}" target="_blank" class="file-link">View File</a>
                            </td>
                            <td>{{ ucfirst($ibtitah->kategori) }}</td>
                            <td>{{ ucfirst($ibtitah->status) }}</td>
                            <td>
                                @if ($ibtitah->status === 'approved')
                                    <button class="done-btn" disabled>Done</button>
                                @else
                                    <form action="{{ route('ibtitah.approve', ['id' => $ibtitah->id, 'kategori' => $ibtitah->kategori]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="approve-btn">Approve</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

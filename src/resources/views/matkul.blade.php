<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <title>Mata Kuliah</title>
    <link rel="stylesheet" href="/css/matkul.css">
    <script src="{{ asset('js/matkul.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <!-- Header dengan ikon back -->
        <div class="header">
            <a href="#"><i class="fas fa-arrow-left"></i></a>
            <div class="title">Mata Kuliah</div>
        </div>

        <div class="buttons">
            <button class="button" onclick="showTaken()">Sudah Diambil</button>
            <button class="button" onclick="showNotTaken()">Belum Diambil</button>
        </div>
        <table class="table" id="matkul-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>
    </div>
</body>
</html>
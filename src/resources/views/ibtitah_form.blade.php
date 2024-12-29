@extends('layouts.app')

@section('content')
<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #F9F9F9; font-family: 'Poppins', sans-serif;">
    <div style="width: 500px; background-color: white; border-radius: 15px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
        <h2 style="text-align: center; margin-bottom: 20px; font-size: 20px; font-weight: bold;">Data Ibtitah</h2>
        <form action="{{ route('admin.ibtitah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table style="width: 100%; border-collapse: separate; border-spacing: 0 15px;">
                <tr>
                    <td style="text-align: left; width: 40%; font-weight: bold;">NIM</td>
                    <td style="text-align: left;">
                        <input type="text" name="nim" id="nim" class="form-control" required style="width: 80%; padding: 8px; border-radius: 8px; border: 1px solid #ddd;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-weight: bold;">Nama</td>
                    <td style="text-align: left;">
                        <input type="text" name="nama" id="nama" class="form-control" required style="width: 80%; padding: 8px; border-radius: 8px; border: 1px solid #ddd;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-weight: bold;">Kategori</td>
                    <td style="text-align: left;">
                        <select name="kategori" id="kategori" class="form-select" required style="width: 80%; padding: 8px; border-radius: 8px; border: 1px solid #ddd;">
                            <option value="Tilawah">Tilawah</option>
                            <option value="Tahfidz">Tahfidz</option>
                            <option value="Ibadah">Ibadah</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left; font-weight: bold;">Choose File</td>
                    <td style="text-align: left;">
                        <input type="file" name="proof_file" id="proof_file" class="form-control" required style="width: 80%; padding: 8px; border-radius: 8px; border: 1px solid #ddd;">
                    </td>
                </tr>
            </table>
            <div style="display: flex; justify-content: center; margin-top: 20px;">
                <button type="submit" style="background-color: #FFD523; color: #333; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; margin-right: 10px; font-size: 14px;">Submit</button>
                <button type="submit" style="background-color: #FFD523; color: #333; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; margin-right: 10px; font-size: 14px;">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

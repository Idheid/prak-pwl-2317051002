@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #afcdfdff, #faf2edff, #f3e5e6ff);
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        color: #222;
    }

    .glass-container {
        min-height: 78.5vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(15px) saturate(160%);
        -webkit-backdrop-filter: blur(15px) saturate(160%);
        border-radius: 25px;
        padding: 40px;
        width: 500px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .glass-card h3 {
        font-weight: 600;
        margin-bottom: 25px;
        text-align: left;
        color: #222;
    }

    .form-label {
        font-size: 14px;
        font-weight: 500;
        color: #444;
    }

    .form-control, .form-select {
        border-radius: 30px;
        border: none;
        padding: 12px 18px;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.6);
        color: #222;
        box-shadow: inset 0 2px 6px rgba(0,0,0,0.08);
    }

    .form-control::placeholder {
        color: #666;
    }

    .form-control:focus, .form-select:focus {
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 0 3px rgba(179, 202, 254, 0.4);
    }

    .btn-glass {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 500;
        border: none;
        color: #fff;
        width: 100px;
        transition: all 0.3s ease;
    }

    /* tombol solid */
    .btn-reset {
        background-color: #7aafffff; 
    }

    .btn-submit {
        background-color: #7aafffff; 
    }

    .btn-glass:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .d-flex.justify-content-between {
        gap: 10px;
    }
</style>

<x-navbar />

<div class="glass-container">
    <div class="glass-card">
        <h3>Tambah Pengguna Baru</h3>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" 
                       class="form-control" 
                       placeholder="Masukkan nama lengkap" required>
            </div>


            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" id="nim" name="nim"
                       class="form-control"
                       placeholder="Masukkan NIM" value="{{ old('nim') }}" required>
            </div>

            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-select" required>
                    <option value="" disabled selected>Pilih kelas</option>
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="reset" class="btn-glass btn-reset">
                    Reset
                </button>
                <button type="submit" class="btn-glass btn-submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<x-footer />
@endsection

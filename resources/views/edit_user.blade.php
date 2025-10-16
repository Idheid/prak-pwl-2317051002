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
        padding: 40px 20px;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(15px) saturate(160%);
        -webkit-backdrop-filter: blur(15px) saturate(160%);
        border-radius: 25px;
        padding: 40px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        transition: all 0.3s ease;
    }

    .glass-card:hover {
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }

    .glass-card h3 {
        font-weight: 600;
        margin-bottom: 25px;
        color: #222;
        text-align: center;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: inline-block;
        color: #333;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.2);
        background: rgba(255, 255, 255, 0.6);
        transition: 0.2s ease;
        font-family: 'Poppins', sans-serif;
    }

    input:focus, select:focus {
        border-color: #6cb2eb;
        background: rgba(255, 255, 255, 0.8);
        outline: none;
        box-shadow: 0 0 0 3px rgba(108,178,235,0.2);
    }

    .btn-submit {
        background: linear-gradient(135deg,#56c596,#6fffe9);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 12px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-submit:hover {
        transform: scale(1.05);
        background: linear-gradient(135deg,#44b986,#4df0d8);
    }

    .btn-back {
        margin-left: 10px;
        text-decoration: none;
        font-weight: 500;
        color: #555;
        transition: color 0.2s;
    }

    .btn-back:hover {
        color: #111;
    }

    .alert {
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 500;
        text-align: center;
    }

    .alert-success {
        background: rgba(72, 187, 120, 0.2);
        color: #2f855a;
        border: 1px solid rgba(72, 187, 120, 0.4);
    }

    .alert-error {
        background: rgba(245, 101, 101, 0.2);
        color: #c53030;
        border: 1px solid rgba(245, 101, 101, 0.4);
    }
</style>

<x-navbar />

<div class="glass-container">
    <div class="glass-card">
        <h3>Edit Data Pengguna</h3>

        {{-- Notifikasi sukses/error --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:15px;">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required>
            </div>

            <div style="margin-bottom:15px;">
                <label>NIM</label>
                <input type="text" name="nim" value="{{ old('nim', $user->nim) }}" required>
            </div>

            <div style="margin-bottom:20px;">
                <label>Kelas</label>
                <select name="kelas_id" required>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="text-align:center;">
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="/user" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>

<x-footer />
@endsection

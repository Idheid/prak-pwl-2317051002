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
        max-width: 950px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .glass-card h3 {
        font-weight: 600;
        margin-bottom: 25px;
        color: #222;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        margin-top: 10px;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 15px;
        overflow: hidden;
    }

    thead {
        background: rgba(255, 255, 255, 0.5);
    }

    thead th {
        padding: 12px;
        text-align: left;
        font-weight: 600;
        color: #333;
    }

    tbody tr {
        transition: background 0.2s ease;
    }

    tbody tr:nth-child(even) {
        background: rgba(255, 255, 255, 0.3);
    }

    tbody tr:hover {
        background: rgba(255, 255, 255, 0.6);
    }

    tbody td {
        padding: 12px;
        color: #222;
    }

    /* --- Tombol Edit dan Delete --- */
    .btn-action {
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.25s ease;
        font-family: 'Poppins', sans-serif;
    }

    .btn-edit {
        background: #6cb2eb;
        color: white;
    }

    .btn-edit:hover {
        background: #4aa0e6;
        transform: scale(1.05);
    }

    .btn-delete {
        background: #f98080;
        color: white;
    }

    .btn-delete:hover {
        background: #f05252;
        transform: scale(1.05);
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
        <h3>Daftar Pengguna</h3>

        {{-- Notifikasi alert sukses/error --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->kelas->nama_kelas ?? '-' }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn-action btn-edit">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding: 15px;">Belum ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<x-footer />
@endsection

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
        max-width: 900px;
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
</style>

{{-- Navbar di luar container agar full width --}}
<x-navbar />

<div class="glass-container">
    <div class="glass-card">
        <h3>Daftar Pengguna</h3>
        <x-user-table :users="$users" />
    </div>
</div>

{{-- Footer di luar container agar full width --}}
<x-footer />
@endsection

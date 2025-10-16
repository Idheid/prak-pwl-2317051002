<?php
Artisan::call('view:clear');
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>

    <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama_mk">Nama Mata Kuliah:</label><br>
        <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $mk->nama_mk) }}" required><br>

        <label for="sks">SKS:</label><br>
        <input type="number" id="sks" name="sks" value="{{ old('sks', $mk->sks) }}" required min="1" max="6"><br><br>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
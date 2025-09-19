<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm'  => $npm,
            'foto' => session('path') // ambil foto dari session jika ada
        ];
        return view('profile', $data);
    }

    public function uploadFoto(Request $request)
    {
        // validasi file
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // simpan file ke storage/app/public/foto
        $path = $request->file('foto')->store('foto', 'public');

        // kirim balik ke view dengan session
        return redirect()->back()->with([
            'success' => 'Foto berhasil diupload!',
            'path' => $path
        ]);
    }
}

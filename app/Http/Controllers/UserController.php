<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        return view('create_user', [
            'title' => 'Create User',
            'kelas' => $kelas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|unique:user,nim',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $this->userModel->create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|unique:user,nim,' . $id,
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $user = $this->userModel->findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
=======


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "") {

        $data = ['nama' => $nama, 'kelas' => $kelas, 'npm' => $npm];

        return view('profile', $data);
    }
    
    public function create() {

        return view('create_user', ['kelas' => Kelas::all(),]);
    }

    public function store(Request $req) {

        $validateData = $req->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.required' => 'Kolom nama masih kosong',
            'npm.required' => 'Kolom NPM masih kosong',
            'kelas_id.required' => 'Kolom kelas masih kosong',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid',
        ]);

        $user = UserModel::create($validateData);

        $user->load('kelas');

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        ]);

        return view('create_user');
    }

    public function store(Request $req) {
        $data = [
            'nama' => $req->input('nama'),
            'npm' => $req->input('npm'),
            'kelas' => $req->input('kelas'),
        ];

        return view('profile', $data);
    }
}

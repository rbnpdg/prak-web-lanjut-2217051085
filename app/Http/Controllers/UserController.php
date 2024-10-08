<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller {

    public $userModel;
    public $kelasModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() { 
        $data = [ 
            'title' => 'Daftar User', 
            'users' => $this->userModel->getUser(), 
        ]; 
    
        return view('list_user', $data); 
    }

    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = ['nama' => $nama, 'kelas' => $kelas, 'npm' => $npm];
        return view('profile', $data);
    }
    
    public function create() {
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();

        $data = ['title' => 'Tambah User', 'kelas' => $kelas,];

        return view('create_user', $data);
    }

    public function store(Request $req) {

        // $validateData = $req->validate([
        //     'nama' => 'required|string|max:255',
        //     'npm' => 'required|string|max:255',
        //     'kelas_id' => 'required|exists:kelas,id',
        // ], [
        //     'nama.required' => 'Kolom nama masih kosong',
        //     'npm.required' => 'Kolom NPM masih kosong',
        //     'kelas_id.required' => 'Kolom kelas masih kosong',
        //     'kelas_id.exists' => 'Kelas yang dipilih tidak valid',
        // ]);

        // $user = UserModel::create($validateData);

        // $user->load('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);

        // return view('create_user');
        this->userModel->create([ 
            'nama' => $request->input('nama'), 
            'npm' => $request->input('npm'), 
            'kelas_id' => $request->input('kelas_id'), 
        ]); 
        
<<<<<<< Updated upstream
        return redirect()->to('/user'); 
=======
        // return redirect()->to('/user'); 
        // Validasi input
        $req->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //Validasi untuk foto
        ]);
        // Handle upload foto
        if ($req->hasFile('foto')) {
            $foto = $req->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName(); 
            // $file->storeAs('upload', $filename, 'public');
            $fotoPath = $foto -> move(('upload/img'), $filename); // Menyimpan file foto di folder 'uploads'
        } else {
            $fotoPath = null; // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
        }

        // Menyimpan data ke database termasuk path foto
        $this->userModel->create([
            'nama' => $req->input('nama'),
            'npm' => $req->input('npm'),
            'kelas_id' => $req->input('kelas_id'),
            'foto' => $filename, // Menyimpan path foto
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id) {
        $user = $this -> userModel -> getUser($id);

        $data = ['title' => 'Profile', 'user' => $user,];

        return view('profile', $data);
>>>>>>> Stashed changes
    }
}

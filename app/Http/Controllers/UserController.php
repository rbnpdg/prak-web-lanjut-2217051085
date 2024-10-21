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

    //Fungsi show list user
    public function index() { 
        $data = [ 
            'title' => 'Daftar User', 
            'users' => $this->userModel->getUser(), 
        ]; 
    
        return view('list_user', $data); 
    }

    //Fungsi show profile
    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = ['nama' => $nama, 'kelas' => $kelas, 'npm' => $npm];
        return view('profile', $data);
    }
    
    //Fungsi create user
    public function create() {
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();

        $data = ['title' => 'Tambah User', 'kelas' => $kelas,];

        return view('create_user', $data);
    }

    //Fungsi save new user
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
        // this->userModel->create([ 
        //     'nama' => $request->input('nama'), 
        //     'npm' => $request->input('npm'), 
        //     'kelas_id' => $request->input('kelas_id'), 
        // ]); 
        
        // return redirect()->to('/user'); 
        // Validasi input
        $req->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' =>
            'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //Validasi untuk foto
        ]);
        
        // // Handle upload foto
        // $filename = null;
        // if ($req->hasFile('foto')) {
        //     $foto = $req->file('foto');
        //     $filename = time() . '_' . $foto->getClientOriginalName(); 
        //     // $file->storeAs('upload', $filename, 'public');
        //     $fotoPath = $foto -> move(('upload/img'), $filename); // Menyimpan file foto di folder 'uploads'
        // } else {
        //     $fotoPath = null; // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
        // }

        //Upload foto
        if($req->hasFile('foto')) {
            $file = $req->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $file->storeAs('upload', $filename); // Menyimpan file ke storage  

            // Simpan data user ke database 
            $this->userModel->create([ 
                'nama' => $req->input('nama'), 
                'npm' => $req->input('npm'), 
                'kelas_id' => $req->input('kelas_id'), 
                'foto' => $filename, // Menyimpan nama file ke database 
            ]);
        }

        // // Menyimpan data ke database termasuk path foto
        // $this->userModel->create([
        //     'nama' => $req->input('nama'),
        //     'npm' => $req->input('npm'),
        //     'kelas_id' => $req->input('kelas_id'),
        //     'foto' => $filename, // Menyimpan path foto
        // ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    //Fungsi show profile
    public function show($id) {
        $user = $this -> userModel -> getUser($id);

        $data = ['title' => 'Profile', 'user' => $user,];

        return view('profile', $data);
    }

    //Fungsi show edit profile
    public function edit($id) {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';

        return view('edit', compact('user', 'kelas', 'title'));
    }

    //Fungsi save edit profile
    public function update(Request $req, $id) {
        $user = UserModel::findOrFail($id);

        $user->nama = $req->nama;
        $user->npm = $req->npm;
        $user->kelas_id = $req->kelas_id;

        if($req->hasFile('foto')) {
            $fileName = time() . '_' . $req->foto->getClientOriginalName();
            $req->foto->move(public_path('upload/img'), $fileName);
            $user->foto = $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('succcess', 'Berhasil update user');
    }

    //Fungsi delete user
    public function destroy($id) {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}

@extends('layouts.app')

@section('content')

<form action="{{ route('user.store') }}" class="form-riil" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="" placeholder="Masukkan nama Anda" >
        @error('nama')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" name="npm" class="form-control" id="npm" aria-describedby="" placeholder="Masukkan NPM Anda">
        @error('npm')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <select name="kelas_id" id="kelas_id" style="width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box;">
            <option value="" disabled selected>Pilih kelas Anda</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
        @error('kelas_id')
            <div style="color: red; font-size: 12px; margin-top: -10px; margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif;">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="file" id="foto" name="foto" style="margin-bottom: 15px;"><br>
        <label for="foto" style="color: #121212;">Foto :</label><br>
    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <a href="/user" class="btn-balik" style="font-size: 14px;background-color: #dc3545; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; margin-right: 10px;">Batal</a>
        <button type="submit" class="btn btn-primary">Tambah User</button>
    </div>
</form>
@endsection

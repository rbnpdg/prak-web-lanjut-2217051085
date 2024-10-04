<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {

            width: 20%;
            padding: 20px;
            width: 15%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);

        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3f3f3f;
            color: #1c9127;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a4a4a;
        }
    </style>
</head>
<body>

<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
    <button type="submit" class="btn btn-primary">Tambah User</button>
</form>

    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="" placeholder="Masukkan nama Anda">
        </div>
        <div class="form-group">
            <input type="text" name="npm" class="form-control" id="npm" aria-describedby="" placeholder="Masukkan NPM Anda">
        </div>
        <div class="form-group">
            <input type="text" name="kelas" class="form-control" id="kelas" aria-describedby="" placeholder="Masukkan Kelas Anda">
        </div>
        <button type="submit" class="btn btn-primary">Tambah User</button>
    </form>

</body>
</html>

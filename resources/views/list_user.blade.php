@extends('layouts.app')

@section('content')
<div class="table-container">

    <a href="{{ route('user.create') }}" class="button-add">Tambah Pengguna Baru</a><br>
    <table class="table">
       <thead> 
          <tr>
             <th>ID</th> 
             <th>Nama</th> 
             <th>NPM</th> 
             <th>Kelas</th>
             <th>Foto</th>
             <th>Aksi</th> 
          </tr> 
       </thead> 
       <tbody> 
          @foreach ($users as $user) 
             <tr> 
                <td>{{ $user['id'] }}</td> 
                <td>{{ $user['nama'] }}</td> 
                <td>{{ $user['npm'] }}</td> 
                <td>{{ $user['nama_kelas'] }}</td>
                <td class="pp"><img src="{{ asset('upload/img/' . $user->foto) }}" class="pp" alt="PP"></td>
                <td>
                   <form action="{{ route('user.show', $user->id) }}" method="GET" style="display:inline-block;">
                      <button type="submit" class="custom-btn btn-detail">View</button>
                   </form>
                   
                   <form action="{{ route('user.edit', $user->id) }}" method="GET" style="display:inline-block;">
                      <button type="submit" class="custom-btn btn-edit">Edit</button>
                   </form>
                   
                   <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="custom-btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                   </form>
               </td> 
             </tr> 
          @endforeach
       </tbody> 
    </table>
</div>
@endsection

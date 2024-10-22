@extends('layouts.app')

@section('content')
<div class="table-container">

    <a href="{{ route('user.create') }}" class="button-add">Tambah Pengguna Baru</a><br>
    <!-- <table class="table">
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
       <tbody>  -->
         @foreach ($users as $user)
         <div class="card" style="width: 18rem; display: inline-block;">
            <img class="card-img-top" src="{{ asset('storage/upload/' . $user->foto) }}" alt="Card image cap" style="">
            <div class="card-body">
               <h5 class="card-title">{{ $user['nama'] }}</h5>
               <p class="card-text">
                     Nama : {{ $user['nama'] }} <br> 
                     NPM : {{ $user['npm'] }} <br>
                     Kelas : {{ $user['nama_kelas'] }} <br> 
                     Jurusan : {{ $user['jurusan'] }} <br>
                     Semester : {{ $user['semester'] }} </p>
               <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary">Detail</a>
               <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
               <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                   </form>
            </div>
         </div>
<!-- 
             <tr> 
                <td>{{ $user['id'] }}</td> 
                <td>{{ $user['nama'] }}</td> 
                <td>{{ $user['npm'] }}</td> 
                <td>{{ $user['nama_kelas'] }}</td>
                <td class="pp"><img src="{{ asset('storage/upload/' . $user->foto) }}" class="pp" alt="PP"></td>
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
             </tr>  -->
          @endforeach
       </tbody> 
    </table>
</div>
@endsection

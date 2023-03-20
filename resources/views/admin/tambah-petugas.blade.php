@extends('layouts/admin-layouts')

@section('content')

<!-- Page Heading -->
<div class="align-items-center d-flex justify-content-center w-100 mb-4">
    <div class="card shadow mb-4 p-5" style="width: 50%">
      <!--  <div class="row">
           <div class="col-md-6">
               <input type="" name="">
           </div>
           <div class="col-md-6">
               
           </div>
       </div> -->
       <form action="/admin-tambah-petugas-action" method="post">
        @csrf
       <input type="text" name="nama_petugas" placeholder="Nama Petugas"class="form form-control">
       <input type="text" name="username" placeholder="Username" class="form form-control mt-3">
        <input type="password" name="password" placeholder="Password" class="form form-control mt-3">
        <input type="text" name="telp" placeholder="Telepon" class="form form-control mt-3">
        <select name="level" class="form form-select mt-3">
              <option value="admin">Choose</option>

            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <button class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
@endsection
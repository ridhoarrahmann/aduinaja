@extends('layouts/user-layouts')
@section('content')
@include('partials/user-navbar')

<div class="container w-100 d-flex justify-content-center ">
  <div class="card form-laporan-card shadow-lg" >
    <a style="margin-top: -10px;"href="/home"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <form action="/tambah-laporan-action" method="post" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-6">
        <label>Nama pengadu</label>
        <input type="" class="form form-control mt-1"name=""  readonly="" value="{{Auth::guard('users')->user()->nama}}">
         <label class="mt-3">NIK pengadu</label>
        <input type="" class="form form-control mt-1"name=""  readonly="" value="{{Auth::guard('users')->user()->nik}}">
         <label class="mt-3">Email pengadu</label>
        <input type="" class="form form-control mt-1"name=""  readonly="" value="{{Auth::guard('users')->user()->email}}">
      </div>
       <div class="col-md-6">
        <label>Jenis pengaduan</label>
        <select class="form form-select mt-1" id="kategori" name="kategori">
          <option>----Pilih Kategori----</option>
          @foreach($kategori as $k)
          <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
          @endforeach
        </select>
        <label class="mt-3">Sub Kategori</label>
        <select class="form form-select mt-1" id="subKategori" name="subkategori">
          
        </select>
        <label class="mt-3">Foto pengaduan</label>
        <input type="file" class="form form-control mt-1" name="foto" >
      </div>
    </div>
    <div class="row mt-2">
      <label>Isi Pengaduan</label>
      <div class="col-md-12 col-12">
        <textarea class="form form-control" name="isi_pengaduan"></textarea>
      </div>
    </div>
    <button class="btn btn-primary mt-3 w-100">Ajukan Pengaduan</button>
    </form>
  </div>
</div>
@endsection
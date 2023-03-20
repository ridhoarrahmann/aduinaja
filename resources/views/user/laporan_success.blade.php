@extends('layouts/user-layouts')
@section('content')
@include('partials/user-navbar')

<div class="container w-100 d-flex justify-content-center ">
  <div class="card form-laporan-card shadow-lg" >
 
      <div class="success bg-success ms-auto me-auto text-center d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-check text-white" ></i>
      </div>
      
      <h3 class="text-success text-center mt-3">Laporan berhasil terkirim</h3>
      <h5 class="text-center mt-2">Laporanmu telah terkirim, silahkan tunggu informasi selanjutnya</h5>
      <a href="/home" class="btn btn-primary mt-3"> kembali ke menu</a>
  </div>
</div>
@endsection
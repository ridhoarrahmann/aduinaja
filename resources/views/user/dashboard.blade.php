@extends('layouts/user-layouts')
@section('content')
@include('partials/user-navbar')

<div class="profile-container d-flex justify-content-center ">
    <div class="profile-card card shadow-lg">
        <div class="row">
            <div class="col-left col-md-5 col-3 d-flex justify-content-center align-items-center">
                <img src="avatar.png" class="avatar">
            </div>
            <div class="col-right col-md-7 col-9 d-flex justify-content-center align-items-center">
                 <h4 class="text-disabled">Halo, {{Auth::guard('users')->user()->nama}}</h4>
            </div>
        </div>
        
       
    </div>
</div>
<div class="menu-container w-100 d-flex justify-content-center ">
    <div class="menu-card  card shadow-lg mt-5 p-2 ">
      <div class="row">
      <div class="col-md-4 col-4 menu-btn-container">
        <a href="tambah-laporan"class="menu-btn shadow-sm text-center">
       
          <i class="fas fa-triangle-exclamation"></i>
          <small> <p>Buat Laporan</p> </small>
        </a>
       
      </div>
      <div class="col-md-4 col-4  menu-btn-container">
        <a href="/history" class="menu-btn shadow-sm text-center">
       
          <i class="fa-solid fa-clock-rotate-left"></i>
          <small> <p>Riwayat Laporan</p> </small>
        </a>
      </div>
      <div class="col-md-4 col-4  menu-btn-container">
        <div class="menu-btn shadow-sm text-center">
          
          <i class="fa-solid fa-bell"></i>
          <small> <p>Notifikasi</p> </small>
        </div>
      </div>
    </div>
    </div>
</div>
<div class="menu-container w-100 d-flex justify-content-center">
  
    <div class="menu-card card-shadow-lg bg red-gradient-bg mt-4 help row">
      
        <div class="col-md-2 col-2 d-flex justify-content-center">
<i class="fa-regular fa-circle-question text-white "></i>
        </div>
         <div class="col-md-10 col-10">
          <h5 class="text-white"> 
        Ingin Membuat Laporan?
    </h5>  
    <br>  
    <a href="">Klik untuk bantuan</a>
        

   
</div>
    </div>

    <!-- info -->

   
 </div>
 <div class="menu-container w-100 d-flex justify-content-center">
  
    <div class="menu-card card-shadow-lg bg red-gradient-bg mt-4 help row">
      
        <div class="col-md-2 col-2 d-flex justify-content-center">
<i class="fa-sharp fa-solid fa-info text-white "></i>
        </div>
         <div class="col-md-10 col-10">
          <h5 class="text-white"> 
        Tentang Aplikasi
    </h5>  
    <br>  
    <a href="">Klik untuk bantuan</a>
        

   
</div>
    </div>

    <!-- info -->
    
   
 </div>

@endsection
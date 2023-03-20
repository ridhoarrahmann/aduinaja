@extends('layouts/user-layouts')
@section('content')
@include('partials/user-navbar')
<div class="row ">
    <a style=""href="/home"><i class="fa fa-arrow-left text-dark mt-2 ms-2" aria-hidden="true"></i></a>
  <div class="history-header red-gradient-bg p-3 card mx-auto mt-2" style="width: 90%;border-radius: 20px;">
   
     <h1 class="text-center text-white ">History</h1>
  </div>
  


</div>

<div class=" mx-auto d-flex justify-content-center mt-3" style="width: 90%;border-radius: 20px;">
 <div class="btn-group w-100" role="group" aria-label="Basic example">
  <a  href="/history" type="button" class="btn btn-outline-danger">Semua</a>
  <a href="/history?s=1" type="button" class="btn btn-outline-danger s-1">Proses</a>
  <a href="/history?s=2" type="button" class="btn btn-outline-danger s-2">Selesai</a>
</div>
</div>

<div class="history-item-container w-100 ">
  @foreach($history as $h)
  <a href="history-detail/{{$h->id_pengaduan}}" class="history-item-btn text-dark">
  <div class="history-item card shadow-lg mx-auto mt-3" style="width: 90%;">
    <div class="row">
      <div class="col-3 d-flex justify-content-center align-items-center">
        <i class=" text-danger fa-solid fa-file history-icon"></i>
      </div>
      <div class="col-9 p-3">
            <small>{{$h->tgl_pengaduan}}</small>
            <br>
            <h7>{{$h->nama_sub_kategori}}</h6>
              <br>
            <small>click to see detail</small>
      </div>
    </div>
  </div>
</a>  
  @endforeach
</div>

@endsection
@extends('layouts/admin-layouts')

@section('content')

    <div class="card w-100 shadow-lg p-3">
        <div class="row">
            <div class="col-md-6">
                    <label for="">Nama pengguna</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->username}}" readonly >
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama}}" readonly>
                    <label for="">NIK</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nik}}" readonly>
                    <label for="">Email</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->email}}"readonly>
            </div>
            <div class="col-md-6">
                    <label for="">Kategori</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama_kategori}}"readonly>
                    <label for="">Sub Kategori</label>
                    <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama_sub_kategori}}"readonly>
                    <label for="">Foto</label>
                    <br>
                    <img src="/public/{{$data_pengaduan->foto}}" alt="" style="width:200px;height:200px;object-fit:cover;">
                    
            </div>

        </div>
        <label for="" class="mt-2">Isi pengaduan</label>
        <textarea name="" class="form form-control" id="" cols="30" rows="3" readonly>{{$data_pengaduan->isi_laporan}}</textarea>
    </div>
    <div class="card w-100 mt-3 p-3">
        <h3 class="text-center">Form dan Update Tanggapan</h3>
        <div class="">  
            @if($data_pengaduan->tanggapan)
 
                @csrf
                <label>Tanggapan : </label>
                <textarea name="tanggapan" class="form form-control" id="" cols="30" rows="3" readonly>{{$data_pengaduan->tanggapan}}</textarea>
                <a href="/pengaduan-update-selesai/{{$data_pengaduan->id_pengaduan}}" class="btn btn-success w-100 mt-3">Selesai</a>
                
          
            @else
 <form action='/tanggapan-pengaduan-tambah/{{$data_pengaduan->id_pengaduan}}' method="post">
                @csrf
                <label>Tanggapan : </label>
                <textarea name="tanggapan" class="form form-control" id="" cols="30" rows="3" ></textarea>
                <button class="btn btn-primary w-100 mt-2">Submit Tanggapan</button>
            </form>
            @endif
           
            <!-- <div class="number bg-primary" style="padding: ;border-radius: 200px;">
                <h4>1</h4>
            </div> -->


            
        </div>
        
    </div>
@endsection
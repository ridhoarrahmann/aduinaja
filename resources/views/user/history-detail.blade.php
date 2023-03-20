@extends('layouts/user-layouts')
@section('content')
@include('partials/user-navbar')

<div class="container w-100 detail-pengaduan-container">
	<a style=""href="/history"><i class="fa fa-arrow-left text-dark mt-2 ms-2" aria-hidden="true"></i></a>
  	<div class="row detail-pengaduan">
  		<div class="col-md-6 col-12 d-flex justify-content-center ">
  			<div>
  				<img src="/public/{{$data_pengaduan->foto}}" class="foto-pengaduan shadow-lg ms-auto me-auto">
  			</div>
  			
  		</div>
  		<div class="col-md-6 col-12 ">
	  		<div class="mb-3 history-detail-data">
	 			 <label for="formGroupExampleInput" class="form-label">Kategori</label>
	 			 <input type="text" class="form-control" id="formGroupExampleInput" value="{{$data_pengaduan->nama_kategori}}" readonly="">
			</div>
			<div class="mb-3">
	 			 <label for="formGroupExampleInput" class="form-label">Sub Kategori</label>
	 			 <input type="text" class="form-control" id="formGroupExampleInput"  value="{{$data_pengaduan->nama_sub_kategori}}" readonly="">
			</div>
			<div class="mb-3">
	 			 <label for="formGroupExampleInput" class="form-label">Isi Pengaduan</label>
	 			<textarea class="form form-control " readonly>
	 					{{$data_pengaduan->isi_laporan}}
	 			</textarea>
			</div>
			
  		</div>
  	</div>
  	<h3 class="text-center mt-3">Progress Pengaduan</h3>
  	<div class="row progress-container mt-5">

  		<div class="col-md-6 col-12 d-flex progress-column">
                 <ul id="progress">
            <?php if($data_pengaduan->status==0) {?>
                <li>
                <div class="node green"></div>
                <p>Pengaduan telah dikirim</p>
            </li>

            <li>
                <div class="progress-divider green">
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_pengaduan}}</p>
                </div>
            </li>

            <li>
                <div class="node grey"></div>
                <p>Pengaduan ditanggapi</p>
            </li>
            <li>
                <div class="progress-divider grey">
                    @if($data_pengaduan->tgl_tanggapan)
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_tanggapan}}</p>
                    @endif
                </div>
            </li>
            
            <li>
                <div class="node grey"></div>
                <p>Selesai</p>
            </li>
            <li>
                <div class="progress-divider grey"></div>
            </li>
            <?php }else if($data_pengaduan->status=='proses'){ ?>
                   <li>
                <div class="node green"></div>
                <p>Pengaduan telah dikirim</p>
            </li>

            <li>
                <div class="progress-divider green">
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_pengaduan}}</p>
                </div>
            </li>

            <li>
                <div class="node green"></div>
                <p>Pengaduan ditanggapi</p>
            </li>
            <li>
                <div class="progress-divider green">
                    @if($data_pengaduan->tgl_tanggapan)
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_tanggapan}}</p>
                    @endif
                </div>
            </li>
            
            <li>
                <div class="node grey"></div>
                <p>Selesai</p>
            </li>
            <li>
                <div class="progress-divider grey"></div>
            </li>
            <?php }else{?>
                   <li>
                <div class="node green"></div>
                <p>Pengaduan telah dikirim</p>
            </li>

            <li>
                <div class="progress-divider green">
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_pengaduan}}</p>
                </div>
            </li>

            <li>
                <div class="node green"></div>
                <p>Pengaduan ditanggapi</p>
            </li>
            <li>
                <div class="progress-divider green">
                    @if($data_pengaduan->tgl_tanggapan)
                    <p class="progress-detail mt-1">{{$data_pengaduan->tgl_tanggapan}}</p>
                    @endif
                </div>
            </li>
            
            <li>
                <div class="node green"></div>
                <p>Laporan selesai</p>
            </li>
            <li>
                <div class="progress-divider green"></div>
            </li>
                <?php }?>
            


            <!-- 2 -->

            <!-- 3 -->

            <!--   <li><div class="node grey"></div><p>The Fourth Thing!</p></li>
    <li><div class="progress-divider grey"></div></li>
    <li><div class="node grey"></div><p>The Last Thing!</p></li> -->
        </ul>
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-3">
                 <label for="formGroupExampleInput" class="form-label">Tanggapan</label>
                <textarea class="form form-control " readonly>
                        @if($data_pengaduan->tanggapan)
                        {{$data_pengaduan->tanggapan}}
                        @else
                        Belum ada tanggapan
                        @endif
                </textarea>
            </div>
            </div>
  	</div>
  	  
    
</div>

@endsection
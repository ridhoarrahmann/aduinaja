@extends('layouts/admin-layouts')

@section('content')
<div class="card w-100 shadow-lg p-3">
    <div class="row">
        <div class="col-md-6">
            <label for="">Nama pengguna</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->username}}" readonly>
            <label for="">Nama Lengkap</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama}}" readonly>
            <label for="">NIK</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nik}}" readonly>
            <label for="">Email</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->email}}" readonly>
        </div>
        <div class="col-md-6">
            <label for="">Kategori</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama_kategori}}" readonly>
            <label for="">Sub Kategori</label>
            <input type="text" class="form form-control mb-2" value="{{$data_pengaduan->nama_sub_kategori}}" readonly>
            <label for="">Foto</label>
            <br>
            <img src="/public/{{$data_pengaduan->foto}}" alt="" style="width:200px;height:200px;object-fit:cover;">

        </div>

    </div>
    <label for="" class="mt-2">Isi pengaduan</label>
    <textarea name="" class="form form-control" id="" cols="30" rows="3" readonly>{{$data_pengaduan->isi_laporan}}</textarea>
    <a href="/admin-laporan-detail-pdf/{{$data_pengaduan->id_pengaduan}}" class="btn btn-danger btn-sm w-100 mt-4">Print</a>
</div>
<div class="card w-100 mt-3 p-3">
    <h3 class="text-center">Progress Laporan</h3>
    <div class="row p-5">
        <!-- <div class="number bg-primary" style="padding: ;border-radius: 200px;">
                <h4>1</h4>
            </div> -->
            <div class="col-md-6">
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
                <p>The Third Thing!</p>
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
                <p>The Third Thing!</p>
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
            <div class="col-md-6">
                <h5>Tanggapan Petugas</h5>
                <textarea class="form form-control mt-2" rows="4">
                    {{$data_pengaduan->tanggapan}}
                </textarea>
            </div>
       

    </div>
</div>
@endsection
@extends('layouts/admin-layouts')

@section('content')

<!-- Page Heading -->
<div class="align-items-center justify-content-between mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                     <h6 class="m-0 font-weight-bold text-primary">Data Masyarakat</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end"> 
                  
              
                                </div>
                            </div>
           
           
        </div>
        <div class="card-body">
            
            <form method="get" >
              <!--   <select name="cari" class="form form-select">
                    <option value="">Tanpa Filter</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>

                </select>
                <button type="submit">Cari</button> -->
            </form>

             
<!---->


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Email</th>
                           
                            <th>Tgl</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          
                        </tr>
                    </thead>
                    <?php $no=1?>
                    <tbody>
                        @foreach($data_pengaduan as $p)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$p->nama_kategori}}</td>
                            
                           <td>{{$p->email}}</td>
                            <td>{{$p->tgl_pengaduan}}</td>
                            <td>
                                @if($p->status==0)
                                    <button class="btn btn-danger btn-sm">Belum ditanggapi</button>
                                @elseif($p->status=='proses')
                                     <button class="btn btn-warning btn-sm">Proses</button>
                                @else
                                     <button class="btn btn-success btn-sm">Selesai</button>

                                @endif
                            </td>
                            <td>

                                <a class="btn btn-sm btn-warning" href="detail-pengaduan/{{$p->id_pengaduan}}"><i class="fa fa-search"></i></a>
                                <a class="btn btn-sm btn-success" href="tanggapan-pengaduan/{{$p->id_pengaduan}}"><i class="fas fa-reply"></i></a>
                              

                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                       
                        
                    </tbody>
                   
                </table>
             
                
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts/admin-layouts')

@section('content')

<!-- Page Heading -->
<div class="align-items-center justify-content-between mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                     <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                     <a class="btn btn-success btn-sm" href="admin-tambah-petugas">Tambah Petugas</a>
                </div>
            </div>
           
           
        </div>
        <div class="card-body">
        <form method="get" >
                <select name="cari" class="form form-select">
                    <option value="">Tanpa Filter</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>

                </select>
                <button type="submit">Cari</button>
            </form>

             



            <div class="table-responsive">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                    <thead>
                        
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>action</th>

                          
                        </tr>
                    </thead>
                    
                    <tbody>
                         <?php $no=1?>
                        @foreach($data_petugas as $dp)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$dp->nama_petugas}}</td>
                            <td>{{$dp->username}}</td>
                            <td>{{$dp->level}}</td>
                            <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detailPetugas{{$dp->id_petugas}}">Detail</button>
                                @if($dp->active=='active')
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#banPetugas{{$dp->id_petugas}}">Ban User</button>
                                @else
<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#activatePetugas{{$dp->id_petugas}}">Activate</button>
                                @endif
                            </td>
                            
                        </tr>
                        <div class="modal fade" id="detailPetugas{{$dp->id_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nama Petugas</label>
        <input type="text" readonly class="form form-control" value="{{$dp->nama_petugas}}" name="">
         <label>Username</label>
        <input type="text" readonly class="form form-control" value="{{$dp->username}}" name="">
         <label>Level</label>
        <input type="text" readonly class="form form-control" value="{{$dp->level}}" name="">
         <label>Telepon</label>
        <input type="text" readonly class="form form-control" value="{{$dp->telp}}" name="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal ban petugas -->
 <div class="modal fade" id="banPetugas{{$dp->id_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nama Petugas</label>
        <input type="text" readonly class="form form-control" value="{{$dp->nama_petugas}}" name="">
         <label>Username</label>
        <input type="text" readonly class="form form-control" value="{{$dp->username}}" name="">
         <label>Level</label>
        <input type="text" readonly class="form form-control" value="{{$dp->level}}" name="">
         <label>Telepon</label>
        <input type="text" readonly class="form form-control" value="{{$dp->telp}}" name="">
         <a href="admin-ban-petugas/{{$dp->id_petugas}}" class="btn btn-danger w-100">Ban User</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>
<!-- activate petugas -->
 <div class="modal fade" id="activatePetugas{{$dp->id_petugas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nama Petugas</label>
        <input type="text" readonly class="form form-control" value="{{$dp->nama_petugas}}" name="">
         <label>Username</label>
        <input type="text" readonly class="form form-control" value="{{$dp->username}}" name="">
         <label>Level</label>
        <input type="text" readonly class="form form-control" value="{{$dp->level}}" name="">
         <label>Telepon</label>
        <input type="text" readonly class="form form-control" value="{{$dp->telp}}" name="">
        <a href="admin-activate-petugas/{{$dp->id_petugas}}" class="btn btn-success w-100">Activate</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
                         <?php $no++ ?>
                        @endforeach
                       
                        
                    </tbody>
                   
                </table>
                <center>{{ $data_petugas->links() }}</center>
                
            </div>
        </div>
    </div>

</div>
@endsection
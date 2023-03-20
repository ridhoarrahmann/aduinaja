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

             



            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>action</th>
                          
                        </tr>
                    </thead>
                    <?php $no=1?>
                    <tbody>
                        @foreach($data_user as $du)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$du->nama}}</td>
                            <td>{{$du->username}}</td>
                            <td>{{$du->email}}</td>
                            <td><button type="button" data-toggle="modal" data-target="#detailMasyarakatModal{{$du['id_masyarakat']}}" class="btn btn-sm btn-warning">Detail</button>
                                @if($du->active=='active')
    <button data-toggle="modal" data-target="#banMasyarakatModal{{$du['id_masyarakat']}}" class="btn btn-danger btn-sm" href="admin-ban-user/{{$du['id_masyarakat']}}">Ban User</button>
    @else
     <button data-toggle="modal" data-target="#activateMasyarakatModal{{$du['id_masyarakat']}}" class="btn btn-success btn-sm" href="admin-ban-user/{{$du['id_masyarakat']}}">Activate User</button>
                                @endif
                            
                            
                        </td>
                            <?php $no++ ?>
                        </tr>

                        <!-- modal detail -->
                      <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="detailMasyarakatModal{{$du['id_masyarakat']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Nama</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nama}}" readonly>
            <label>Username</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->username}}" readonly>
            <label>Email</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->email}}" readonly>
            <label>NIK</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nik}}" readonly>
             <label>Status</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->active}}" readonly>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
<!-- modal banned -->
<div class="modal fade" id="banMasyarakatModal{{$du['id_masyarakat']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Nama</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nama}}" readonly>
            <label>Username</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->username}}" readonly>
            <label>Email</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->email}}" readonly>
            <label>NIK</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nik}}" readonly>
            <a href="admin-ban-masyarakat/{{$du->id_masyarakat}}" class="btn btn-danger w-100"> Ban user</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
<!-- activate user -->
<div class="modal fade" id="activateMasyarakatModal{{$du['id_masyarakat']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Nama</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nama}}" readonly>
            <label>Username</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->username}}" readonly>
            <label>Email</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->email}}" readonly>
            <label>NIK</label>
            <input type="" name="" class="form form-control mb-2" value="{{$du->nik}}" readonly>
            <a href="admin-activate-masyarakat/{{$du->id_masyarakat}}" class="btn btn-success w-100"> Activate</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
                        @endforeach
                       
                        
                    </tbody>
                   
                </table>
                <center>{{ $data_user->links() }}</center>
                
            </div>
        </div>
    </div>

</div>
@endsection
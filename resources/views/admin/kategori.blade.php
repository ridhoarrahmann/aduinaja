@extends('layouts/admin-layouts')

@section('content')

<!-- Page Heading -->
<div class="align-items-center justify-content-between mb-4">
  <div class="row">
    <div class="col-md-6 col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Data Kategori & Sub Kategori</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahKategoriModal" type="button">Tambah Kategori</button>
              <!-- modal -->


              <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="tambah-kategori">
                        @csrf
                        <input type="text" class="form form-control" required placeholder="Nama Kategori" name="nama_kategori">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="card-body">



          <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

              <thead>

                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>action</th>



                </tr>
              </thead>

              <tbody>
                <?php $no = 1 ?>
                @foreach($data_kategori as $dk)
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$dk->nama_kategori}}</td>

                  <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detailKategoriModal{{$dk->id_kategori}}" type="button"><i class="fa fa-search"></i></button>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editKategoriModal{{$dk->id_kategori}}" type="button"><i class="fa fa-pen"></i></button>
                    <a class="btn btn-sm btn-danger" href="{{ route('kategori-hapus', $dk->id_kategori) }}"><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
                <?php $no++ ?>

                <!-- modal -->
                <!-- detail kategori modal -->
                <!-- detail kategori modal -->
                <div class="modal fade" id="detailKategoriModal{{$dk->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <label for="exampleFormControlSelect1" class="mt-3">Nama Kategori</label>
                        <input type="text" class="form form-control" value="{{$dk->nama_kategori}}" readonly="readonly" name="">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- edit kategori modal -->

                <div class="modal fade" id="editKategoriModal{{$dk->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('kategori-edit', $dk->id_kategori) }}" method="post">
                          @csrf
                          <label for="exampleFormControlSelect1" class="mt-3">Nama Kategori</label>
                          <input type="text" class="form form-control" value="{{$dk->nama_kategori}}" name="nama_kategori">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- end modal -->

                @endforeach


              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold text-primary">Data Sub Kategori</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahSubKategoriModal" type="button">Tambah Sub Kategori</button>
              <!-- modal -->


              <div class="modal fade" id="tambahSubKategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="tambah-sub-kategori">
                        @csrf
                        <input type="text" name="nama_sub_kategori" class="form form-control" placeholder="Nama Sub Kategori">
                        <select class="form form-control mt-3" name="id_kategori">
                          @foreach($data_kategori as $dk)
                          <option value="{{$dk->id_kategori}}">{{$dk->nama_kategori}}</option>
                          @endforeach
                        </select>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>
        <div class="card-body">
          <!-- <form method="get" >
                <select name="cari" class="form form-select">
                    <option value="">Tanpa Filter</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>

                </select>
                <button type="submit">Cari</button>
            </form> -->





          <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

              <thead>

                <tr>
                  <th>No</th>
                  <th>Sub Kategori</th>
                  <th>Kategori</th>
                  <th>Action</th>


                </tr>
              </thead>

              <tbody>
                <?php $no = 1 ?>
                @foreach($data_sub_kategori as $k)
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$k->nama_sub_kategori}}</td>
                  <td>{{$k->nama_kategori}}</td>
                  <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detailSubKategoriModal{{$k->id_kategori}}" type="button"><i class="fa fa-search"></i></button>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editSubKategoriModal{{$k->id_kategori}}" type="button"><i class="fa fa-pen"></i></button>
                    <a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>


                </tr>
                <?php $no++ ?>

                <!-- modal -->
                <!-- detail sub kategori modal -->

                <div class="modal fade" id="detailSubKategoriModal{{$k->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <label for="exampleFormControlSelect1" class="mt-3">Nama Sub Kategori</label>
                        <input type="text" id="" class="form form-control" value="{{$k->nama_sub_kategori}}" readonly="readonly" name="">
                        <label for="exampleFormControlSelect1" class="mt-3">Nama Kategori</label>
                        <input type="text" id="" class="form form-control" value="{{$k->nama_kategori}}" readonly="readonly" name="">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- edit subkategori modal -->

                <div class="modal fade" id="editSubKategoriModal{{$k->id_kategori}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('sub-kategori-edit', $k->id_sub_kategori) }}" method="post">
                          @csrf
                          <label for="exampleFormControlSelect1" class="mt-3">Nama Sub Kategori</label>
                          <input type="text" class="form form-control" value="{{$k->nama_sub_kategori}}" name="nama_sub_kategori">
                                  <label for="exampleFormControlSelect1" class="mt-3">Nama Kategori</label>
                          <select class="form form-control" name="nama_kategori">
                              @foreach($data_kategori as $dk)
                              @if($dk->nama_kategori==$k->nama_kategori)
                               <option selected value="{{$dk->id_kategori}}">{{$dk->nama_kategori}}</option>
                              @else
<option value="{{$dk->id_kategori}}">{{$dk->nama_kategori}}</option>
                              @endif
                                
                              @endforeach
                          </select>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
          

                @endforeach


              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
  </div>


</div>


<!-- modal -->


<!-- end modal -->
@endsection
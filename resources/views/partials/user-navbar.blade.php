<!--  <nav class="navbar shadow-sm navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aduin<span>Aja</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto me-auto">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        
      </div>
      <img class="avatar" src="avatar.png">
    </div>
  </div>
</nav> -->
<div class="navbar bg-light shadow-lg py-2 px-3">
  <h3>AduinAja</h3>

  <button data-bs-toggle="modal" data-bs-target="#profileModal" class="profile border p-2 shadow-sm">
      <small>{{Auth::guard('users')->user()->nama}}</small>
      <img class="avatar ms-2" src="{{asset('avatar.png')}}">

  </button>
</div>

<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="profile-modal d-flex justify-content-center w-100">
          <div>
             <center> <img src="avatar.png" class="shadow-lg "></center>
              <h5 class="text-center mt-2">{{Auth::guard('users')->user()->nama}}</h5>
              <p class="text-center">
            {{Auth::guard('users')->user()->email}}
              </p>
     <p class="text-center">
       
                {{Auth::guard('users')->user()->nik}}
            </p>
            <a href="/logout" class="btn btn-danger w-100 mt-2">Log Out</a>
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
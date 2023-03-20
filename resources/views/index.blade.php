<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="landing-page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <!--navbar  -->
  <nav class="navbar py-2 px-3 navbar-expand-lg navbar-dark" style="background-color: #c30d36;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Aduin <span style="font-we"></span> Aja</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto me-auto">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="#tentang">Tentang</a>
          <a class="nav-link" href="#">Alur</a>
          

      
        </div>
        <a href="/login" class="btn btn-light">Login</a>
      </div>
    </div>
  </nav>
<!-- home -->
<div class="home-container" style="height:90vh;">
    <div class="row">
        <div class="col-md-6 p-5 d-flex justify-content-end align-items-center">
            <div>
            <h1 style="color:#c30d36;">Layanan Pengaduan</h1>
            <h1>Masyarakat
                
            </h1>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-none d-lg-flex	 justify-content-center align-items-center">
                <img src="home_ill.svg" class="" alt="">
        </div>
    </div>
</div>

<div id="tentang" class="tentang w-100 mt-4 d-flex justify-content-center align-items-center" style="background-color: #c30d36;">
    <div>
        <h2 class="text-center text-white">Tentang</h2>
        <h5 class="text-white text-center">Aplikasi berbasis website AduinAja merupakan aplikasi layanan pengaduan masyarakat yang ditujukan untuk melakukan pengaduan atas suatu masalah secara online dimanapun kapanpun.</h5>
    </div>

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
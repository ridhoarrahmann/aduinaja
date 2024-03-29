@extends('layouts/auth-layouts')
@section('content')
<div class="background-auth w-100">
    <div class="container auth  h-100 w-100 d-flex justify-content-center align-items-center" id="auth">
        <div class="auth-card card p-4 d-flex align-items-center justify-content-center">
            <div class="w-100 ">
                <h2 class="text-center mb-4">Aduin<span style="color:#ae0b1a ;">Aja</span></h2>

                <form action="/register_action" method="post">
                    @csrf

                    <input type="text" class="form form-control  @error('nama') is-invalid @enderror " name="nama" placeholder="Nama Lengkap">
                    @error('nama')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="text" class="form form-control  @error('username') is-invalid @enderror mt-3" name="username" placeholder="Username">
                    @error('username')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="text" class="form form-control mt-3 @error('nik') is-invalid @enderror" name="nik" placeholder="NIK">
                    @error('nik')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="text" class="form form-control mt-3 @error('email') is-invalid @enderror" name="email" placeholder="E-Mail">
                    @error('email')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="text" class="form form-control mt-3 @error('telp') is-invalid @enderror" name="telp" placeholder="Phone">
                    @error('telp')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="password" class="form form-control mt-3 @error('nik') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <!-- <input type="password" class="form form-control mb-3" name="password2" placeholder="Confirm Password"> -->
                    <button type="submit" class="btn btn-main w-100 mt-3">Register</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
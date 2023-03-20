@extends('layouts/auth-layouts')
@section('content')
<div class="background-auth w-100">
        <div class="container auth  h-100 w-100 d-flex justify-content-center align-items-center" id="auth">
            <div class="auth-card card p-4 d-flex align-items-center justify-content-center">
                <div class="w-100 ">
                <h2 class="text-center mb-4">Aduin<span style="color:#ae0b1a ;">Aja</span></h2>
                @if($message=Session::get('message'))
                <div class="alert alert-success" role="alert">
 {{$message}}
</div>
                @endif
                <form action="/login_action" method="post">
                    @csrf

                    <input type="text" class="form form-control @error('nik') is-invalid @enderror" name="nik" placeholder="Nik">
                    @error('nik') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    <input type="password" class="form form-control mt-3 @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
               
                    <button type="submit" class="btn btn-main w-100 mt-3">Login</button>
                   <a href="register"> <button type="button" class="btn btn-outline-main w-100 mt-3">Sign Up</button></a>
                   <small><a class="text-danger" href="/forgot-password">Lupa password</a></small>
                   <br>
                   <small><a href="admin_login" class=" text text-center text-danger"> login as admin</a></small>
                </form>
            </div>
            </div> 
        </div>
    </div>
    @endsection
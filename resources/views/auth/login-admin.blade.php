@extends('layouts/auth-layouts')
@section('content')
<div class="background-auth w-100">
        <div class="container auth  h-100 w-100 d-flex justify-content-center align-items-center" id="auth">
            <div class="auth-card card p-4 d-flex align-items-center justify-content-center">
                <div class="w-100 ">
                <h2 class="text-center mb-4">Login<span style="color:#ae0b1a ;">Admin</span></h2>
                @if($message=Session::get('message'))
                <div class="alert alert-success" role="alert">
 {{$message}}
</div>
                @endif
                <form action="/login_admin_action" method="post">
                    @csrf

                    <input type="text" class="form form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                    @error('username') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    <input type="password" class="form form-control mt-3 @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    <button type="submit" class="btn btn-main w-100 mt-3">Login</button>
                  
                   <small><a href="/" class=" text text-center text-danger"> login as user</a></small>
                </form>
            </div>
            </div> 
        </div>
    </div>
    @endsection
@extends('layouts/auth-layouts')
@section('content')
<div class="background-auth w-100">
        <div class="container auth  h-100 w-100 d-flex justify-content-center align-items-center" id="auth">
            <div class="auth-card card p-4 d-flex align-items-center justify-content-center">
                <div class="w-100 ">
                <h2 class="text-center mb-4">Forgot<span style="color:#ae0b1a ;">Password</span></h2>
                @if($message=Session::get('message'))
                <div class="alert alert-success" role="alert">
 {{$message}}
</div>
                @endif
                <form action="/forgot-password-action" method="post">
                    @csrf

                    <input type="email" class="form form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    
                    <button type="submit" class="btn btn-main w-100 mt-3">Send Link</button>
                  
                   <small><a href="/" class=" text text-center text-danger"> login as user</a></small>
                </form>
            </div>
            </div> 
        </div>
    </div>
    @endsection
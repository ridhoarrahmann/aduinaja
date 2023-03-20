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
                <form action="/forgot-password-form-submit" method="post">
                    @csrf

                    <input readonly type="email" class="form form-control @error('email') is-invalid @enderror" value="{{$data_user->email}}" name="email" placeholder="Email">
                    @error('email') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    <input type="password" class=" mt-2     form form-control @error('password_confirm') is-invalid @enderror"  name="password" placeholder="password ">
                    @error('email') 
                    <div id="validationServer03Feedback" class="invalid-feedback">{{$message}} </div>
                    @enderror
                    <input type="password" class=" mt-2 form form-control @error('password_confirm') is-invalid @enderror"  name="password_confirmation" placeholder="password confirm">
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
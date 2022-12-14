@extends('master')

@section('content')
<div class="mb-4 h-90">
    <div class="card d-flex m-4 mx-5 justify-content-center">
        <div class="card-header ">
            <h3 class="text-marker text-center">Login</h3>
            @auth
                <span>You are logged in as {{Auth::user()->name}}</span>
            @endauth
            @guest
                <span>You are a guest!</span>
            @endguest
        </div>
        <div class="card-body align-items-center justify-content p-4">
            <div id="login-card" class="card card-body mx-auto shadow">
                <form action="{{route('authenticate')}}" method="POST" class="d-flex flex-column">
                    @csrf
                    <span class="text-marker">Username</span>
                    <input class="mb-3 form-control" type="text" name="name" placeholder="Cool username">
                    <span class="text-marker">Password</span>
                    <small><a href="#passwordResetModal" data-toggle="modal" data-target="#passwordResetModal">Forgot your password?</a></small>
                    <input class="form-control" type="password" name="password">
                    <div id="login-buttons" class="d-flex justify-content-between mt-3 px-4">
                        <a class="btn btn-primary" href="{{route('signin')}}">Create Account</a>
                        <input class="btn btn-primary" type="submit" value="Login">
                    </div>
                </form>
                
            </div>
        </div>

        {{-- Modal --}}

        <div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-marker" id="exampleModalLabel">Reset password</h5>
                  
                </div>
                <div class="modal-body">
                  <span>Please enter your email to reset your password.</span>
                  <form action="{{route('password-reset')}}" method="POST">
                    @csrf
                    <input type="email" class="form-control my-2" name="email" id="">
                    <div class="d-flex mt-1">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mx-2">Send mail</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

@section('style')
<style>
    form * {
        margin-top: 1%;
    }
    
    #login-card{
        max-width: 50%;
    }

    @media only screen and (max-width: 768px){
        #login-card{
            min-width: 90%;
        }

        #login-buttons{
            flex-direction: column;
            padding: 0 !important;
        }

        #login-buttons input:first{
            margin-bottom: 5%;
        }

        #login-buttons input{
            width:100% !important;
        }


    }
</style>    
@endsection

@extends('master')

@section('content')

<div class="card d-flex m-4 justify-content-center">
    <div class="card-header ">
        <h3 class="text-marker text-center">Sign In</h3>
    </div>
    <div class="card-body align-items-center justify-content p-4">
        <div id="login-card" class="card card-body mx-auto shadow">
            <form action="{{route('createUser')}}" method="POST" class="d-flex flex-column">
                @csrf
                <span class="text-marker">Username</span>
                <input class="mb-3 form-control" type="text" name="name" placeholder="Cool username" required>
                <span class="text-marker">Email</span>
                <input class="mb-3 form-control" type="email" name="email" placeholder="awesome@email.yo" required>
                <span class="text-marker">Password</span>
                <input class="form-control" type="password" name="password" required>
                <span class="text-marker">Confirm Password</span>
                <input class="form-control" type="password" name="password_confirm" required>
                <div id="login-buttons" class="d-flex flex-nowrap mt-3 px-4">
                    <a class="btn btn-primary me-auto" href="{{route('login')}}" type="submit">Login</a>
                    <input class="btn btn-primary" type="button" value="Sign In">
                </div>
            </form> 
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

@extends('master')

@section('content')
    <div class="card mx-auto w-50 text-center mt-3 p-2 text-marker">User Configuration</div>
    <div class="card d-flex flex-column align-content-center mx-auto mb-3 mt-3 p-2 w-75" >
        <div class="card mx-auto mt-3 p-2 w-25 text-center">Logged as: <strong>{{Auth::user()->name}}</strong></div>
        <form class="d-flex flex-column mb-3 mx-auto w-50" action="{{route('updateUser')}}" method="POST">
            @csrf
            <span class="text-marker">New user name</span>
            <input type="text" name="name" placeholder="Username" required>
            <span class="text-marker">Password</span>
            <input type="password" name="password" placeholder="Password" required>

            {{-- TODO: "change password" field --}}

            {{-- <span class="text-marker">Confirm Password</span>
            <input type="password" name="password_confirm" placeholder="Password" required> --}}
            <div id="buttons" class="d-flex flex-column align-content-between mt-2">
                <input type="submit" class="btn btn-primary my-2" value="Update my account!">
            </div>
        </form>
    </div>
@endsection
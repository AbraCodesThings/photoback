
<div id="nav-buttons" class="d-flex flex-row justify-content-center p-3 my-2 mx-5 card card-body border rounded shadow">
    @if(Auth::guest())
    <a href="{{route('signin')}}" class="btn btn-primary mx-4 shadow">Create account</a>
    <a href="{{route('login')}}" class="btn btn-primary mx-4 shadow">Login</a>
    @elseif(Auth::user())
    <a href="{{route('upload-form')}}" class="btn btn-primary mx-4 shadow">Upload image</a>
    <a href="{{route('user-config')}}" class="btn btn-primary mx-4 shadow">User configuration</a>	
    <a href="{{route('logout')}}" class="btn btn-primary mx-4 shadow">Logout</a>
    <a href="{{route('gallery', ['user' => Auth::user()->name])}}" class="btn btn-primary mx-4 shadow">My gallery</a>

    @endif
    <a href="{{route('devinfo')}}" class="btn btn-primary mx-4 shadow">Info for developers</a>
</div>

<style>
         @media(max-width: 600px){
            #nav-buttons{
                flex-direction: column !important;
            }
            #nav-buttons a{
                margin-top: 2%;
                margin-bottom: 2%;
            }
         }
</style>
    


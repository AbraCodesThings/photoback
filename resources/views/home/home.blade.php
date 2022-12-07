@extends('master')

@section('content')

	<div class="d-flex flex-row justify-content-center mt-3 search-bar">
		<form action="{{route('search')}}" method="GET" role="search">
			<div class="form-group d-flex flex-row">	{{-- TODO --}}
				<input class="form-control mr-2" type="text" name="tags" placeholder="tags">
				<button class="btn btn-primary" type="submit" title="Search">
					<span>Search</span>
				</button>
			</div>
		</form>
	</div>
	
	<div class="mt-2 mx-3 p-3 mw-100 home-content ">

		{{-- Main content card --}}

		<div class="card shadow">
			<h1 class="card-header text-center">A free open source image hosting API!</h1>
			<h4 class="p-3 text-center">
				Quick, short and easy: this is an image hosting API free for everybody to use and tinker with!
			</h4>
			<h5 class="ms-3 fst-italic">
				<strong class="">How does it work?</strong>
			</h5>
			<div class="mx-3 mt-2 ms-4">
				<p>
					Written in Laravel, this application makes directories inside the project folder based on the
					user-uploaded content,
					and provides API routes to manage said user content.
				</p>
				<p>
					It also uses a MySQL database to store user, directory and image info.
				</p>
			</div>
			<h5 class="ms-3 fst-italic">
				<strong class="">But... why?</strong>
			</h5>
			<div class="mx-3 mt-2 ms-4">
				<p>
					Because <strong>why the hell not?</strong> Programming is fun!
				</p>
				<p>
					But on a more serious note: this is my Software Development studies' final project.
					I chose an image hosting API because it's something actually useful for artists, graphical designers and
					so on,
					and I intend to continue its development in the near future...
				</p>
				<p>
					...that is, of course, if I end up having the time to do it after I find a job...
				</p>
			</div>
			<h5 class="ms-3 fst-italic">
				<strong>Keep in mind:</strong>
			</h5>
			<div class="mx-3 mt-2 ms-4">
				<ul>
					<li class="mb-2">
						I am the amateur-est of the amateurs among web devs, don't expect this to work
						<strong>PERFECTLY</strong>.<br>
						You can use this project's GitHub page to notify any errors or bugs you may encounter.
					</li>
					<li class="mb-2">
						This project includes an example frontend to show and test API functionality, but the point is to
						allow anyone to make their own frontend which may use this API.
					</li>
				</ul>
			</div>
      
          {{-- Navigation Buttons --}}
      
          <div id="buttons" class="d-flex p-3 mb-2 mx-auto border rounded shadow">
			  @if(Auth::guest())
              <a href="{{route('signin')}}" class="btn btn-primary shadow">Create account</a>
			  <a href="{{route('login')}}" class="btn btn-primary mx-4 shadow">Login</a>
			  @elseif(Auth::user())
			  <a href="{{route('upload-form')}}" class="btn btn-primary mx-4 shadow">Upload image</a>
			  <a href="{{route('user-config')}}" class="btn btn-primary mx-4 shadow">User configuration</a>	
			  <a href="{{route('logout')}}" class="btn btn-primary mx-4 shadow">Logout</a>
			  <a href="{{route('gallery', ['user' => Auth::user()->name])}}" class="btn btn-primary mx-4 shadow">My gallery</a>

			  
			  @endif
              <a href="{{route('devinfo')}}" class="btn btn-primary shadow">Info for developers</a>
          </div>
		</div>
	</div>
@endsection

@section('style')
	<style>

		p.lorem {
			position: relative;
		}

		div.home-content {
			border-style: groove;
			border: 10px black;
		}

		#buttons {
			display: flexbox;
			gap: 12px;
		}

    @media only screen and (max-width: 768px){
      #buttons{
        flex-direction: column;
      }

      #buttons a{
        margin-top: 5%;
      }


    }
		
	</style>
@endsection

@section('js')
	<script></script>
@endsection

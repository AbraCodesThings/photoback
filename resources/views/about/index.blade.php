@extends('master')

@section('content')

<div class="mt-2 mx-3 p-3 mw-100 home-content ">
    <div class="row justify-content-between">
      <div class="col-md-9 card m-7">

        <div class="card-header mb-3">
          <h1>Guide</h1>
        </div>

          <h3 class="card-subtitle p-3">
            In this guide you'll learn to use the Photoback image hosting API!
          </h3>
          {{-- <div class="card d-flex mb-5 align-self-center align-content-center justify-self-center justify-content-center">
            
          </div> --}}
          <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est laborum.
          </p>
          <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est laborum.
          </p>
          <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est laborum.
          </p>
          <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
            est laborum.
          </p>
      </div>
      <div class="col-md-2 sticky-top card">
        <nav>
          <ul class="nav d-flex align-items-center">
            <li class="nav-item" href="#"><a class="nav-link">Section 1</a></li>
            <li class="nav-item" href="#"><a class="nav-link">Section 2</a></li>
            <li class="nav-item" href="#"><a class="nav-link">Section 3</a></li>
            <li class="nav-item" href="#"><a class="nav-link">Section 4</a></li>
            <li class="nav-item" href="#"><a class="nav-link">Section 5</a></li>
            <li class="nav-item" href="#"><a class="nav-link">Section 6</a></li>
          </ul>
        </nav>
      </div>
  </div>
</div>

@endsection

@section('style')
<style>
  p.lorem{
    position: relative;
  }  

  div.home-content{
    border-style: groove;
    border: 10px black;
  }

  @if ($agent->isMobile()) {{-- Mobile corrections (and more!) at load --}}

  @elseif ($agent->isDesktop()) {{-- Desktop-specific CSS rules --}}
  
  @else {{-- Whatever --}}

  @endif

</style>
@endsection

@section('js')

<script>

</script>

@endsection

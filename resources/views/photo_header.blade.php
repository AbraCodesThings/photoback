<div id="header" class="photo-header" >
  <div id="header-title" class="">
    <h1 class="display-1">
      <a href="{{route('home')}}" style="text-decoration: none; color:white">Photoback</a>
    </h1>
  </div>
</div>

@if(Auth::user())
  <div class="text-center shadow card w-25 mx-auto mt-3 text-marker">Hello, {{Auth::user()->name}}!</div>
@endif
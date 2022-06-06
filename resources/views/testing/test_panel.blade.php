@extends('placeholder')

@section('test_panel')
  <div class="d-flex">
    <form class="d-flex" action="{{route('upload_post')}}" method="post">
      <label># Probar ruta upload_post #</label>
      
    </form>
  </div>
@stop

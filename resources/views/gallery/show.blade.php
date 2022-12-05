@extends('master')

@section('content')
    <div class="card card-body d-flex flex-row m-2 ">
        {{-- aquí va un @foreach que itera sobre una serie de fotos que trae el backend y se crea una miniatura clickable --}}
        @if($images)
            @foreach($images as $image)
                <div class="border m-2 w-50 h-50 image d-flex flex-column">
                    <img class="mw-100 mh-100" src="{{Storage::url($image->path)}}" alt="{{$image->title}}">
                    <span class="text-center">{{$image->title}}</span>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('js')
    <script>
        // jquery a cada imagen para que vaya a la ruta que muestra la imagen con sus cosas
    </script>
@endsection

@section('style')
    <style>
        .image {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
@endsection
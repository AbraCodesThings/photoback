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
    <div class="card card-body d-flex flex-row m-2 ">
        {{-- aquí va un @foreach que itera sobre una serie de fotos que trae el backend y se crea una miniatura clickable --}}
        @if($images)
            @foreach($images as $image)
                <div class="border m-2 w-50 h-50 image d-flex flex-column">
                    <a href="{{route('image-details', ["username"=>$user->name, "image_title"=>$image->title])}}">
                        <img class="mw-100 mh-100" src="{{Storage::url($image->path)}}" alt="{{$image->title}}">
                    </a>
                    <span class="text-center">{{$image->title}}</span>
                </div>
            @endforeach
            {{-- else : mensaje de que no se han encontrado resultados --}}
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
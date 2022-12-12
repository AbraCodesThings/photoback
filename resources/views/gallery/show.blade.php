@extends('master')

@section('content')
    
    <div class="card card-body d-flex flex-row m-2 mx-5 ">
        @if($images->count() >= 1)
            @foreach($images as $image)
                <div class="border m-2 w-50 h-50 image d-flex flex-column">
                    <a href="{{route('image-details', ["username"=>$image->user->name, "image_title"=>$image->title])}}">
                        <img class="mw-100 mh-100" src="{{Storage::url('public/images/' . $image->user->name . '/' . $image->path)}}" alt="{{$image->title}}">
                    </a>
                    <span class="text-center">{{$image->title}}</span>
                </div>
            @endforeach
            {{-- else : mensaje de que no se han encontrado resultados --}}
        @else
                <span class="mx-auto">No images here!</span>
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
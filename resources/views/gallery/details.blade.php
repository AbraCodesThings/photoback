@extends('master')

@section('content')
    
    <div class="card card-body d-flex flex-row mx-4 mt-4">
        <img class="img-fluid h-50 w-50" src="{{Storage::url('public/images/' . $user->name . '/' . $image->path)}}" alt="">
        <div class="mx-3 d-flex flex-column">
            <h1 class="text-marker">{{$image->title}}</h1>
            <span class="my-2">
                - by <a href="{{route('search', ["search-options" => "uploader", "search-params" => $image->user->name])}}">{{$image->user->name}}</a>
            </span>
            
            
            <div class="mt-auto">
                <h4 class="text-marker">Tags</h4>
                {{-- <span>{{Storage::url('public/images/' . $user->name . '/' . $image->path)}}</span> --}}
                @foreach($image->tags as $tag)
                    <a href="{{route('search', ["search-options" => "tag", "search-params" => $tag->tagname])}}">
                        <button class="btn btn-primary btn-round">{{$tag->tagname}}</button>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-column align-content-center justify-content-center mx-auto">
            {{-- Caja de texto con la URL para embeber la imagen en otro sitio --}}
            <span>
                <a href="{{Storage::url('public/images/' . $user->name . '/' . $image->path)}}">Link to the file</a>
            </span>
        </div>
    </div>

    <div class="mt-4 mx-4 card card-body">
        <span class="text-marker mr-auto">Leave a comment!</span>
        <form class="d-flex form-group-lg" method="POST" action="{{route('create-comment', ['username' => $image->user->name, 'image_title' => $image->title])}}">
            @csrf
            <input class="form-control" type="text" name="text" id="">
            <button class="btn btn-primary mx-3" type="submit">Submit</button>
        </form>
    </div>

    <div class="comment-box card card-body d-flex flex-column mx-4 my-4">
        @if($comments->count() >= 1)
            @foreach ($comments as $comment)
                <div class="card card-body d-flex my-3">
                    <span class="mr-3 text-marker">{{$comment->user->name}}: </span>
                    <span class="mx-4 mt-3">{{$comment->comment}}</span>
                    <span class="align-self-end">{{$comment->created_at}}</span>
                </div>
            @endforeach
        @else
                <span class="mx-auto"> No comments yet! </span>
        @endif
    </div>
@endsection

@section('js')

@endsection
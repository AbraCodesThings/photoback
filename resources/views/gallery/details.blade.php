@extends('master')

@section('content')
    
    <div class="card card-body d-flex flex-row mx-4 mt-4">
        <img class="img-fluid h-50 w-50" src="{{Storage::url('public/images/' . $user->name . '/' . $image->path)}}" alt="">
        <div class="mx-auto">
            <span class="text-marker">{{$image->title}}</span>
        </div>
    </div>

    <div class="form-group mt-4 d-flex flex-row justify-content-center">
        <form class="d-flex flex-row" method="POST" action="{{route('create-comment', ['username' => Request::segment(2), 'image_title' => Request::segment(3)])}}">
            @csrf
            <input class="form-control" type="text" name="text" id="">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    <div class="comment-box card card-body d-flex flex-column mx-4 my-4">
        @if($comments)
            @foreach ($comments as $comment)
                <div class="card card-body">
                    <span>{{$comment->comment}}</span>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('js')

@endsection
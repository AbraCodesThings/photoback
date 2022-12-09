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
    <div class="card card-body d-flex flex-row mx-4 mt-4">
        <img class="img-fluid h-50 w-50" src="{{Storage::url($image->path)}}" alt="">
        <div class="mx-auto">
            <span class="text-marker">{{$image->title}}</span>
            {{-- más datos --}}
        </div>
    </div>

    <div class="card card-body d-flex flex-row mx-4 my-4">
        <label for="">comentarios aqui</label>
    </div>
@endsection

@section('js')

@endsection

@section('style')

@endsection
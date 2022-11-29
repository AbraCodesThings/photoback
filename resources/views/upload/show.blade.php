@extends('master')

@section('content')
    <div class="container h-90">

        @if(Session::has('success'))
        <div class="alert alert-success mt-4">
            {{Session::get('success')}}
        </div>
        @elseif(Session::has('errors'))
        <div class="alert alert-success mt-4">
            {{Session::get('errors')}}
        </div>
        @endif

        <div class="row">
            <div class="col-md">
                <div class="card m-3 mx-auto p-2 d-flex flex-column align-content-center">
                    <form class="d-flex justify-content-center flex-column mx-auto p-2" enctype="multipart/form-data" action="{{route('upload')}}" method="POST">
                        @csrf
                        <input class="mb-2" type="file" name="image" required>
                        <label class="mb-2">Title: </label> <input class="mb-2" type="text" name="title" placeholder="Title">
                        <label class="mb-2">Tags (separated by spaces): </label> <input class="mb-2" type="text" name="tags" placeholder="Tags">
                        <input class="mb-2" type="submit" value="Upload">
                    </form>
                </div>
            </div>
            <div class="col-sm">
                <div class="card m-3 mx-auto p-2 d-flex flex-column align-content-center">
                    <div class="border border-secondary mh-75 mw-75">
                        test
                    </div>    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        
    </style>
@endsection
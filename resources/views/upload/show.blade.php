@extends('master')

@section('content')
    <div class="card m-3 mx-auto p-2 d-flex flex-column align-content-center">
        <form class="d-flex flex-column mx-auto p-2" action="{{route('upload')}}" method="POST">
            <input type="file" name="image" required>
            <input type="submit" value="Upload">
        </form>
    </div>
@endsection
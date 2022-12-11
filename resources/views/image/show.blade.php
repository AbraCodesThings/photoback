@section('content')
    <div class="image card card-body">
        <div class="image-view">
            {{-- vista de la imagen --}}
            <img src="{{Storage::url($image->path)}}" alt="{{$image->title}}">
        </div>
        <div class="image-data">
            {{-- datos de la imagen --}}
            <span>Title: {{$image->title}}</span>
            <span>Uploaded by: {{$image->user_id}}</span>
        </div>
    </div>
    <div class="comment-box">
        {{-- comentarios --}}
    </div>
@endsection
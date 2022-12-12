<div class="d-flex flex-row justify-content-center mt-3 search-bar">
    <form action="{{route('search')}}" method="GET" role="search">
        <div class="form-group d-flex flex-row">	{{-- TODO --}}
            <input id="search-box" class="form-control" type="text" name="search-params" placeholder="tags">
            <button class="btn btn-primary mx-2" type="submit" title="Search">
                <span>Search</span>
            </button>
        </div>
        <span class="text-light"><input type="radio" name="search-options" value="tag" id="radio-tags" checked>By tag</span>
        <span class="text-light"><input type="radio" name="search-options" value="uploader" id="radio-uploader">By uploader</span>
        <span class="text-light"><input type="radio" name="search-options" value="title" id="radio-title">By title</span>
    </form>
</div>
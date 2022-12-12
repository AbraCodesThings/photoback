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
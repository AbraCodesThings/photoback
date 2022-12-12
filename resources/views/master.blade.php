<!DOCTYPE html>
<html lang="en" dir="ltr">

  @include('headers')

  <body>
    @include('testing.photo_header')
    @include('buttons')
    @include('searchbox')
    {{-- @include('navbar') --}}

    @yield('content')

    {{-- @include('footer') --}}

    @yield('style')

    @include('scripts')

    @yield('js')

  </body>
</html>

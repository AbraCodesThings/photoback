<!DOCTYPE html>
<html lang="en" dir="ltr">

  @include('headers')

  <body>
    @include('testing.photo_header')

    @include('navbar')

    @yield('content')

    @include('footer')

    @yield('js')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')

    <title>@yield('title')</title>

    @stack('before.style')
        @include('includes.style')
    @stack('after.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('includes.navbar')

      @include('includes.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      
      @include('includes.footer')
    </div>
  </div>

  @stack('before.script')
    @include('includes.script')
  @stack('after.script')
</body>
</html>
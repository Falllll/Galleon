<!DOCTYPE html>
<html>
  @include('layouts.dashboard.header')
    <body class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500">
      @include('layouts.dashboard.sidenav')
        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
          @include('layouts.dashboard.navbar')
          @yield('content')

        </main>
      @include('layouts.dashboard.config')
    </body>
  @include('layouts.dashboard.scripts')
</html>

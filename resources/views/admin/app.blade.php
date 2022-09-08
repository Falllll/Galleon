@include('layouts.admin.header')
<body class="bg-gray-100 font-family-karla flex">
    @include('layouts.admin.sidebar')
    <div class="w-full flex flex-col h-screen overflow-y-hidden">

        @include('layouts.admin.navbar')
            <div class="w-full overflow-x-hidden border-t flex flex-col">
                    @yield('content')
                    
                </div>
                
            </div>
            @include('layouts.admin.script')
</body>
</html>
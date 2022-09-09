<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="px-2 py-4">
        <a href="" class=" text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ Auth::user()->name }}</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ url('admin') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ url('admin/project') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-folder mr-3"></i>
            Project List
        </a>
        <a href="{{ url('admin/customer') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user-minus mr-3"></i>
            Customer
        </a>
        <button class="w-full flex items-center text-white text-base font-semibold pt-3 opacity-75 hover:opacity-100 py-4 pl-6 nav-item" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <i class="fas fa-users mr-3"></i>
            Employee
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <ul id="dropdown-example" class="hidden py-2 space-y-1">
            <li class=" w-full">
                <a href="{{ url('admin/user') }}" class="flex items-center text-white opacity-75 bg-blue-800 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    User
                </a>
            </li>
            <li class=" w-full">
                <a href="{{ url('admin/position') }}" class="flex items-center text-white opacity-75 bg-blue-800 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sitemap mr-3"></i>
                    Position
                </a>
            </li>
        </ul>
        
        <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-calendar mr-3"></i>
            Calendar
        </a>
    </nav>
    
</aside>
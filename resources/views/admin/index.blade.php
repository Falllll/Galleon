@extends('admin.app')
@section('title','Dashboard')
@section('content')
<div class="w-full">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <a href="{{ route('admin.project.index') }}">
                <div class="border-b-4 border-indigo-600 bg-white rounded-lg shadow-xl p-5 transform hover:scale-110 trasition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-folder fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Company Projects</h5>
                            <h3 class="font-bold text-3xl">{{ $projects }} <span class="text-indigo-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
            </a>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <a href="{{ route('admin.customer.index') }}">
                <div class="border-b-4 border-indigo-600 bg-white rounded-lg shadow-xl p-5 transform hover:scale-110 trasition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-user-minus fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Company Customer</h5>
                            <h3 class="font-bold text-3xl">{{$customers}} <span class="text-indigo-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
            </a>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <a href="{{ route('admin.user.index') }}">
                <div class="border-b-4 border-indigo-600 bg-white rounded-lg shadow-xl p-5 transform hover:scale-110 trasition duration-300">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-user fa-2x fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-600">Company Users</h5>
                            <h3 class="font-bold text-3xl">{{$users}} <span class="text-indigo-600"><i class="fas fa-caret-up"></i></span></h3>
                        </div>
                    </div>
                </div>
            </a>
            <!--/Metric Card-->
        </div>
    </div>
</div>
    
@endsection



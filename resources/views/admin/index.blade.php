@extends('admin.app')
@section('title','Dashboard')
@section('content')
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <a href="">
                        <div class="border-b-4 border-indigo-600 bg-white rounded-lg shadow-xl p-5 transform hover:scale-110 trasition duration-300">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-table fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Kabar Desa</h5>
                                    <h3 class="font-bold text-3xl">asd <span class="text-indigo-600"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--/Metric Card-->
                </div>
            </main>
    
@endsection



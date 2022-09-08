@extends('admin.app')
@section('title','Project')
@section('content')

@if(session()->has('status'))
<div id="alert" class="absolute top-20 right-4 w-80 flex bg-green-600 rounded-lg p-4 mb-4" role="alert">
    <svg class="w-5 h-5 text-white flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-sm font-medium text-white">
        {{ session('status') }}
    </div>
</div>
@endif

<main class="w-full flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">Tabbed Content</h1>

    <div class="w-full mt-6" x-data="{ openTab: 1 }">
        <div>
            <ul class="flex border-b">
                <li class="-mb-px mr-1" @click="openTab = 1">
                    <a :class="openTab === 1 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Project Detail</a>
                </li>
                <li class="mr-1" @click="openTab = 2">
                    <a :class="openTab === 2 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Task</a>
                </li>
                <li class="mr-1" @click="openTab = 3">
                    <a :class="openTab === 3 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Issue</a>
                </li>
                <li class="mr-1" @click="openTab = 4">
                    <a :class="openTab === 4 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">Comment</a>
                </li>
            </ul>
        </div>
        <div class="bg-white p-6">
            @include('admin.project.component._show')
            @include('admin.project.component._task')
            @include('admin.project.component._issue')
            @include('admin.project.component._comment')
        </div>
    </div>
</main>

@endsection
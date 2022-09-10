@extends('admin.app')
@section('title','Project')
@section('content')

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
            @include('admin.project.detail')
            @include('admin.task.index')
            @include('admin.issue.index')

            <div id="" class="mx-4" x-show="openTab === 4">
                @comments(['model' => $project])
            </div>
        </div>
    </div>
</main>

@endsection
@extends('dashboard.app')
@section('title', 'Project')
@section('head', 'Project')
@section('header', 'Project')
@section('content')
@include('layouts.dashboard.detail-project')
    
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-none w-1/2 max-w-full px-3 mt-4">
                    <a class="inline-block px-6 py-3 font-bold text-cente uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer
        leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 z-10"
                        href="{{ url('dashboard/project')}}/{{ $project->id }}/{{ 'jobs/create' }}"> <i class="fas fa-plus">
                        </i>&nbsp;&nbsp;Add New
                        Job</a>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3  text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Job Name</th>
                                    <th
                                        class="px-6 py-3 pl-2  text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Description</th>
                                    <th
                                        class="px-6 py-3  text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Worker</th>
                                    <th
                                        class="px-6 py-3  text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Type</th>
                                        <th
                                        class="px-6 py-3  text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-sm border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job as $data)                            
                                <tr>
                                    <td
                                        class="underline p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center ">
                                                
                                                <a class="underline text-blue-600" href="{{ url('dashboard/project/task') }}/{{ $data->id }}" >
                                                    {{ $data->name }}
                                                </a> 
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ $data->description }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ $data->worker->name }}
                                        </p>

                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ $data->type_id }}
                                        </p>

                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ $data->status }}
                                        </p>

                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">

                                        </span>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="{{ url('dashboard/project/job') }}/{{ $data->id }}/{{ 'edit' }}"
                                            class="font-semibold leading-tight text-xs text-slate-400">
                                            Edit </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



















    <!-- plugin for scrollbar  -->
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <!-- github button -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- main script file  -->
    <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4') }}" async></script>

@endsection

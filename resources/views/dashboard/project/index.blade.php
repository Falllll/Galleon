@extends('dashboard.app')
@section('title', 'Project')
@section('head', 'Project')
@section('header', 'Project')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                {{-- <div class="flex-none w-1/2 max-w-full px-3 mt-4">
                    <a class="inline-block px-6 py-3 font-bold text-cente uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer
                    leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 z-10"
                        href="{{ url('dashboard/project/create') }}"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New
                        Project</a>
                </div> --}}
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Project Name</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Proposal Date</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Customer</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Customer Email</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    {{-- <th
                                        class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $data)
                                    <tr>
                                        <td
                                            class="underline p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center ">
                                                    <a href="{{ url('dashboard/project') }}/{{ $data->id }}"
                                                        class="mb-0leading-normal text-sm ">
                                                        {{ $data->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                {{ date('d F Y', strtotime($data->proposal_date)) }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                            @if (empty($data->customer->name))
                                                <span class="font-semibold leading-tight text-xs text-red-600">
                                                    Tidak ada customer
                                                </span>
                                            @else
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    {{ $data->customer->name }}
                                                </span>
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if (empty($data->customer->email))
                                                <span class="font-semibold leading-tight text-xs text-red-600">
                                                    Tidak ada email
                                                </span>
                                            @else
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    {{ $data->customer->email }}
                                                </span>
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                {{ $data->status }}
                                            </span>
                                        </td>
                                        {{-- <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a href="{{ url('dashboard/project') }}/{{ $data->id }}/{{ 'edit' }}"
                                                class="font-semibold leading-tight text-xs text-slate-400"> Edit </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

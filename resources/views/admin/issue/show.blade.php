@extends('admin.app')
@section('title', 'Task')
@section('content')

    <div class="m-2 relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4 pt-6">
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                        <h6 class="mb-4 leading-normal text-xl">Task Detail</h6>
                        <span class="mb-2 leading-tight text-sm">Task ID: <span
                                class="font-semibold text-slate-700 sm:ml-2">{{ $issue->id }}</span></span>
                        <span class="mb-2 leading-tight text-sm">From Project:
                            <span class="font-semibold text-slate-700 sm:ml-2">
                                @if (empty($issue->project->name))
                                    <span class="text-red-600">
                                        Tidak Ada Project
                                    </span>
                                @else
                                    <a class="underline" href="{{ url('admin/project') }}/{{ $issue->project->id }}">
                                        {{ $issue->project->name }}
                                    </a>
                                @endif
                            </span>
                        </span>
                        <span class="mb-2 leading-tight text-sm">Task Name: <span
                                class="font-semibold text-slate-700 sm:ml-2">{{ $issue->name }}</span></span>
                        <span class="mb-2 leading-tight text-sm">Task Description:
                            <span class="font-semibold text-slate-700 sm:ml-2">
                                @if (empty($issue->description))
                                    <span class="text-red-600">
                                        Tidak Ada Deskripsi
                                    </span>
                                @else
                                    {{ $issue->description }}
                                @endif
                            </span>
                        </span>
                        <span class="mb-2 leading-tight text-sm">Worker:
                            <span class="font-semibold text-slate-700 sm:ml-2">
                                @if (empty($issue->worker->name))
                                    <span class="text-red-600">
                                        Tidak Ada pekerja
                                    </span>
                                @else
                                    {{ $issue->worker->name }}
                                @endif
                            </span>
                        </span>
                        <span class="mb-2 leading-tight text-sm">Task Status:
                            <span class="font-semibold text-slate-700 sm:ml-2">
                                {{ $issue->status }}
                            </span>
                        </span>

                        <span class="mb-2 leading-tight text-sm">Created At: <span
                                class="font-semibold text-slate-700 sm:ml-2">{{ date('d F Y', strtotime($issue->created_at)) }}</span></span>
                        <span class="mb-2 leading-tight text-sm">Updated At: <span
                                class="font-semibold text-slate-700 sm:ml-2">{{ date('d F Y', strtotime($issue->updated_at)) }}</span></span>
                                <span class="mb-2 leading-tight text-sm">Task File:
                                    <span class="font-semibold text-slate-700 sm:ml-2">
                                        @if (empty($issue->file))
                                                <span class="text-red-600">
                                                    Tidak Ada file
                                                </span>
                                            @else
                                            <a href="{{ asset('storage/doc/issue/' . $issue->file) }}"
                                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                                                >
                                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                                    <span>Download</span>
                                            </a>
                                            @endif
                                        
                                    </span>
                                </span>
                        
                                <span class="mb-2 leading-tight text-sm">Task Image:

                                    @if (empty($issue->img))
                                    <span class="text-red-600">
                                        Tidak Ada gambar
                                    </span>
                                @else
                                <span class="w-4/5">
                                    <a class="example-image-link" href="{{ asset('storage/img/issue/' . $issue->img) }}"
                                        data-lightbox="example-1"><img class="example-image"
                                            src="{{ asset('storage/img/issue/' . $issue->img) }}" alt="image-1" />
                                        </a>

                                </span>
                               
                                @endif
                            
                        </span>
                    </div>
                    <div class="ml-auto text-right">
                        {{-- <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a> --}}
                        <a href="{{ url('admin/project/issue') }}/{{ $issue->id }}/{{ 'edit' }}"
                            class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                            href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                                aria-hidden="true"></i>Edit</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>






@endsection

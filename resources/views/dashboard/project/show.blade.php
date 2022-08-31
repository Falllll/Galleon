@extends('dashboard.app')
@section('title', 'Project')
@section('head', 'Project')
@section('header', 'Project')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="">
                            <div class="relative right-0">
                                <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills
                                    role="tablist">
                                    <li class="z-30 flex-auto text-center">
                                        <a href="{{url('dashboard/project')}}/{{$project->id}}" class="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700"
                                            nav-link active href="javascript:;" role="tab" aria-selected="true">
                                            <span class="ml-1">Detail Project</span>
                                        </a>
                                    </li>
                                    <li class="z-30 flex-auto text-center">
                                        <a href="{{url('dashboard/project')}}/{{$project->id}}/{{ 'jobs' }}" class="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700"
                                            nav-link href="javascript:;" role="tab" aria-selected="false">
                                            <span class="ml-1">Daftar Pekerjaan</span>
                                        </a>
                                    </li>
                                    <li class="z-30 flex-auto text-center">
                                        <a href="{{ url('dashboard/project') }}/{{ $project->id }}/{{ 'issue' }}" class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700"
                                            nav-link href="javascript:;" role="tab" aria-selected="false">
                                            <span class="ml-1">Issue</span>
                                        </a>
                                    </li>
                                    <li class="z-30 flex-auto text-center">
                                        <a href="{{ url('dashboard/project') }}/{{ $project->id }}/{{ 'comment' }}" class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700"
                                            nav-link href="javascript:;" role="tab" aria-selected="false">
                                            <span class="ml-1">Chat</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="">
                                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                      <div class="flex-auto p-4 pt-6">
                                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                          <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                                            <div class="flex flex-col">
                                              <h6 class="mb-4 leading-normal text-xl">Project Detail</h6> 
                                              <span class="mb-2 leading-tight text-sm">Project Name: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->name }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Project Description: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->description }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Proposal Date: <span class="font-semibold text-slate-700 sm:ml-2">{{ date("d F Y", strtotime($project->proposal_date))}}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Project Status: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->status }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->customer->name }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer Email: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->customer->email }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer Phone: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->customer->phone }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer Address: <span class="font-semibold text-slate-700 sm:ml-2">{{ $project->customer->address }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Created At: <span class="font-semibold text-slate-700 sm:ml-2">{{ date("d F Y", strtotime($project->created_at))}}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Updated At: <span class="font-semibold text-slate-700 sm:ml-2">{{ date("d F Y", strtotime($project->updated_at))}}</span></span>
                                            </div>
                                            <div class="ml-auto text-right">
                                              {{-- <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a> --}}
                                              <a href="{{url('dashboard/project')}}/{{$project->id}}/{{'edit'}}" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                                            </div>
                                          </li>

                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
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

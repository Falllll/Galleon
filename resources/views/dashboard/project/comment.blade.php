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
                                            <span class="ml-1">Task</span>
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
                                            <span class="ml-1">Comment</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="mx-4">
                                    @comments(['model' => $project])
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

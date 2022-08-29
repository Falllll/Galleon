@extends('dashboard.app')
@section('title','Task')
@section('head', 'Task')
@section('header', 'Task')
@section('content')

<div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                    <form role="form" method="POST" action="{{route('dashboard.project.task.update', $task->id)}}">
                     @method('PUT') 
                    @csrf
  
                    <input type="hidden" name="project_id" value="{{$project->id}}">

                            <select class="focus:shadow-soft-primary-outline text-sm leading-5.6
                             ease-soft block w-full appearance-none rounded-lg border 
                             border-solid border-gray-300 bg-white bg-clip-padding
                              px-3 py-2 font-normal text-gray-700 transition-all
                               focus:border-fuchsia-300 focus:outline-none
                                focus:transition-shadow" name="is_status" id="is_status">
                                <option value="">Status&hellip;</option>
                                <option value="Running">Running</option>
                                <option value="In-Progress">In-Progress</option>
                                <option value="Ready">Ready</option>
                            </select>



                      <div class="text-left">
                        <button type="submit" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-cente uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Update</button>
                      </div>
                    </form>
                  </div>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>


@endsection
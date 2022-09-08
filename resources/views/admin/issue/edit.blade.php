@extends('admin.app')
@section('title','issue')
@section('content')

<form method="POST" action="{{route('admin.issue.update', $issue->id)}}" class="p-3">
    @method('PUT')
    @csrf
    <div class="bg-white rounded shadow border p-6">
        <input type="hidden" name="project_id" value="{{ $issue->project_id }}">
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="name">Name<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <input id="name" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name" value="{{old('name', $issue->name)}}" />
                @if($errors->has('name'))
                <div class="text-red-600 italic">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="description">Description</label>
            </div>
            <div class="col-span-5">
                <input id="description" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" value="{{old('description', $issue->description)}}" />
                @if($errors->has('description'))
                <div class="text-red-600 italic">{{ $errors->first('description') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="worker_id">Worker<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <div class="relative w-full border border-gray-400">
                    <select id="worker_id"
                        class="block p-2 w-full appearance-none focus:outline-none {{ $errors->has('worker_id') ? 'is-invalid' : '' }}"
                        name="worker_id">
                        <option value="">Select Worker</option>
                        @foreach($workers as $data)
                            @if ( old('worker_id', $issue->worker_id) == $data->id )
                                <option value="{{$data->id}}" selected>{{$data->name}}</option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    {{-- <div class="flex items-center pointer-events-none absolute inset-y-0 right-0 px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div> --}}
                </div>
                @if($errors->has('worker_id'))
                <div class="text-red-600">{{$errors->first('worker_id')}}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="type_id">Type<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <div class="relative w-full border border-gray-400">
                    <select id="type_id"
                        class="block p-2 w-full appearance-none focus:outline-none {{ $errors->has('type_id') ? 'is-invalid' : '' }}"
                        name="type_id">
                        @if ( old('type_id', $issue->type_id) == $issue->type_id )
                        <option value="{{$issue->type_id}}" selected>--{{$issue->type_id}}--</option>
                        <option value="Minor">Minor</option>
                        <option value="Major">Major</option>
                        <option value="Critical">Critical</option>
                        @endif
                    </select>
                    {{-- <div class="flex items-center pointer-events-none absolute inset-y-0 right-0 px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div> --}}
                </div>
                @if($errors->has('type_id'))
                <div class="text-red-600">{{$errors->first('type_id')}}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="status">Status<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <div class="relative w-full border border-gray-400">
                    <select id="status"
                        class="block p-2 w-full appearance-none focus:outline-none {{ $errors->has('status') ? 'is-invalid' : '' }}"
                        name="status">
                        @if ( old('status', $issue->status) == $issue->status )
                        <option value="{{$issue->status}}" selected>--{{$issue->status}}--</option>
                        <option value="To Do">To Do</option>
                        <option value="Proggress">Progress</option>
                        <option value="Done">Done</option>
                        @endif
                    </select>
                    {{-- <div class="flex items-center pointer-events-none absolute inset-y-0 right-0 px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div> --}}
                </div>
                @if($errors->has('status'))
                <div class="text-red-600">{{$errors->first('status')}}</div>
                @endif
            </div>
        </div>



        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Tambah
        </button>
        <a href="{{ url('admin/project') }}/{{ $issue->project_id }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>
@endsection
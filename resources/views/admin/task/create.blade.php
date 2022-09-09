@extends('admin.app')
@section('title','Task')
@section('content')

<form method="POST" action="{{route('admin.task.store')}}" class="p-3" enctype="multipart/form-data">
    @csrf
    <div class="bg-white rounded shadow border p-6">
        <input type="hidden" name="project_id" value="{{ $id }}">
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="name">Name<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <input id="name" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name" value="{{old('name')}}" />
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
                    name="description" value="{{old('description')}}" />
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
                        <option value="{{$data->id}}">{{$data->name}}</option>
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
                        <option value="">Type</option>
                        <option value="Main">Main</option>
                        <option value="Additional">Additional</option>
                        <option value="other">other</option>
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
                <label class="font-bold text-lg" for="file">File</label>
            </div>
            <div class="col-span-5">
                <input id="file" type="file"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('file') ? 'is-invalid' : '' }}"
                    name="file" value="{{old('file')}}" />
                @if($errors->has('file'))
                <div class="text-red-600 italic">{{ $errors->first('file') }}</div>
                @endif
            </div>
        </div>
        
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="img">Image</label>
            </div>
            <div class='flex flex-col items-center justify-center w-full'>
                <label for="img"
                    class='flex flex-col border-4 border-dashed w-full h-46 hover:bg-gray-100 hover:border-purple-300 group'>
                    <div class='flex flex-col items-center justify-center pt-7 pb-4'>
                        <img class="img-preview w-56 h-40 object-cover object-center border-2 border-dashed">
                        {{-- <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> --}}
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                            Select a photo</p>
                    </div>
                    <input id="img" value="{{old('img')}}" name="img" type='file'
                        class="{{ $errors->has('img') ? 'is-invalid' : '' }}" />
                </label>
            </div>
        </div>


        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Tambah
        </button>
        <a href="{{ url('admin/project') }}/{{ $id }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>
@endsection
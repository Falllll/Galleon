@extends('admin.app')
@section('title','User')
@section('content')

<form method="POST" action="{{ route('admin.user.store') }}" class="p-3">
    @csrf
    <div class="bg-white rounded shadow border p-6">
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
                <label class="font-bold text-lg" for="email">Email<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <input id="email" type="email"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email" value="{{old('email')}}" />
                @if($errors->has('email'))
                <div class="text-red-600 italic">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="position_id">Position<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <div class="relative w-full border border-gray-400">
                    <select id="position_id"
                        class="block p-2 w-full appearance-none focus:outline-none {{ $errors->has('position_id') ? 'is-invalid' : '' }}"
                        name="position_id">
                        <option value="">Select Position</option>
                        @foreach($positions as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                    {{-- <div class="flex items-center pointer-events-none absolute inset-y-0 right-0 px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div> --}}
                </div>
                @if($errors->has('position_id'))
                <div class="text-red-600">{{$errors->first('position_id')}}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="password">Password<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <input id="password" type="password"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    name="password" value="{{old('password')}}" />
                @if($errors->has('password'))
                <div class="text-red-600 italic">{{ $errors->first('password') }}</div>
                @endif
            </div>
        </div>

        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Tambah
        </button>
        <a href="{{ url('admin/user') }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>

@endsection
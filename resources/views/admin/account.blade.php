@extends('admin.app')
@section('title','Profile')

@section('content')

<form method="POST" action="{{ route('admin.profile.update') }}">
    @csrf
    <div class="bg-white rounded shadow border p-6">
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="">Nama</label>
            </div>
            <div class="col-span-5">
                <input type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name" required value="{{ Auth::user()->name }}" />
                @if($errors->has('name'))
                <div class="text-red-600 italic">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="">Email</label>
            </div>
            <div class="col-span-5">
                <input type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email" required value="{{ Auth::user()->email }}" />
                @if($errors->has('email'))
                <div class="text-red-600 italic">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="">Password Baru <span class="text-sm italic">(Minimal 6
                        karakter)</span></label>
            </div>
            <div class="col-span-5">
                <input type="password"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                    name="new_password" />
                @if($errors->has('new_password'))
                <div class="text-red-600 italic">{{ $errors->first('new_password') }}</div>
                @endif
            </div>
        </div>
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="">Konfirmasi Password</label>
            </div>
            <div class="col-span-5">
                <input type="password"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                    name="confirm_password" />
                @if($errors->has('confirm_password'))
                <div class="text-red-600 italic">{{ $errors->first('confirm_password') }}</div>
                @endif
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Simpan
        </button>
        <a href="{{url('admin')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>
@endsection
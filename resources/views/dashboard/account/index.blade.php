@extends('dashboard.app')
@section('title','Account')
@section('head', 'Account')
@section('header', 'Account')
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
        <div>

            <button type="submit" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-cente uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-gray-600 to-slate-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85 text-white">
                Simpan
            </button>
        </div>
    </div>
</form>
<script src="https://cdn.tailwindcss.com"></script>

@endsection
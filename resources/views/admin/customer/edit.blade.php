@extends('admin.app')
@section('title','Customer')
@section('content')

<form method="POST" action="{{ route('admin.customer.update', $customer->id) }}" class="p-3">
    @method('PUT')
    @csrf
    <div class="bg-white rounded shadow border p-6">
        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="name">Name<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <input id="name" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name" value="{{old('name', $customer->name)}}" />
                @if($errors->has('name'))
                <div class="text-red-600 italic">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="email">Email</label>
            </div>
            <div class="col-span-5">
                <input id="email" type="email"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email" value="{{old('email', $customer->email)}}" />
                @if($errors->has('email'))
                <div class="text-red-600 italic">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="phone">Phone</label>
            </div>
            <div class="col-span-5">
                <input id="phone" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                    name="phone" value="{{old('phone', $customer->phone)}}" />
                @if($errors->has('phone'))
                <div class="text-red-600 italic">{{ $errors->first('phone') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="address">Address</label>
            </div>
            <div class="col-span-5">
                <input id="address" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('address') ? 'is-invalid' : '' }}"
                    name="address" value="{{old('address', $customer->address)}}" />
                @if($errors->has('address'))
                <div class="text-red-600 italic">{{ $errors->first('address') }}</div>
                @endif
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Update
        </button>
        <a href="{{ url('admin/customer') }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>

@endsection
@extends('admin.app')
@section('title', 'Customer')
@section('content')

    <div class="w-full px-2">
        <div class="flex md:flex-row flex-col gap-y-3 min-w-full flex items-center justify-between bg-indigo-600 p-3">
            <a class="py-1 px-3 text-blue-600 bg-gray-100" href="{{ url('admin/customer/create') }}">
                Tambah
            </a>
            {{-- <form action="{{ route('') }}">
        <div class="flex shadow items-center bg-white rounded-full "">
                    <div class=" w-full">
            <input type="search" value="{{ request('search') }}" name="search"
                class="w-full px-4 py-1 rounded-full focus:outline-none" placeholder="Search...">
        </div>
        <div>
            <button type="submit"
                class="flex bg-celadon-600 items-center justify-center w-12 h-12 text-gray-100 rounded-full">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    </form> --}}
        </div>
    </div>
    <div class="bg-white overflow-auto mt-4 px-2">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Adress</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php
                    $i = 1;
                @endphp
                @foreach ($customers as $data)
                    <tr>
                        <td class="text-left py-3 px-4">{{ $i++ }}</td>
                        <td class="text-left py-3 px-4">
                            <a class="underline text-blue-600" href="{{ url('admin/customer') }}/{{ $data->id }}" >
                                {{ $data->name }}
                            </a>    
                        </td>
                        <td class="text-left py-3 px-4">
                            {{-- jika Email Belum diisi --}}
                            @if (empty($data->email))
                                <span class="text-red-600">
                                    Belum ada Email
                                </span>
                            @else
                                {{ $data->email }}
                            @endif
                        </td>
                        <td class="text-left py-3 px-4">
                            {{-- jika Phone Belum diisi --}}
                            @if (empty($data->phone))
                                <span class="text-red-600">
                                    Belum ada No Telepon
                                </span>
                            @else
                                {{ $data->phone }}
                            @endif
                        </td>
                        <td class="text-left py-3 px-4">
                            {{-- jika Email Belum diisi --}}
                            @if (empty($data->address))
                                <span class="text-red-600">
                                    Belum ada alamat
                                </span>
                            @else
                                {{ $data->address }}
                            @endif
                        </td>
                        <td class="text-left py-3 px-4">
                            {{-- jika Email Belum diisi --}}
                            @if ($data->is_active == 1)
                                <span>
                                    Active
                                </span>
                            @else
                                Non-Active
                            @endif
                        </td>
                        <td class="flex space-x-2 text-left py-3 px-4">
                            <a href="{{ url('admin/customer') }}/{{ $data->id }}/{{ 'edit' }}">
                                <div
                                    class="bg-green-500 inline-block py-1 px-2 hover:bg-green-700 text-white font-normal rounded transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </a>
                            <form action="{{ url('admin/customer') }}/{{ $data->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-normal py-1 px-2 rounded transition duration-300"
                                    onclick="return confirm('anda yakin ingin menghapus data?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="p-3">

        </div>

    </div>
@endsection

@extends('admin.app')
@section('title','Project')
@section('content')

<form method="POST" action="{{route('admin.project.update', $project->id)}}" class="p-3">
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
                    name="name" value="{{old('name', $project->name)}}" />
                @if($errors->has('name'))
                <div class="text-red-600 italic">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="customer_id">Customer<span class="text-red-600">*</span></label>
            </div>
            <div class="col-span-5">
                <div class="relative w-full border border-gray-400">
                    <select id="customer_id"
                        class="block p-2 w-full appearance-none focus:outline-none {{ $errors->has('customer_id') ? 'is-invalid' : '' }}"
                        name="customer_id">
                        <option value="">Select Customer</option>
                        @foreach($customers as $data)
                            @if ( old('customer_id', $project->customer_id) == $data->id )
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
                @if($errors->has('customer_id'))
                <div class="text-red-600">{{$errors->first('customer_id')}}</div>
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
                        @if ( old('status', $project->status) == $project->status )
                        <option value="{{$project->status}}" selected>--{{$project->status}}--</option>
                        <option value="Plan">Plan</option>
                        <option value="Progress">Progress</option>
                        <option value="Done">Done</option>
                        <option value="Closed">Closed</option>
                        <option value="Canceled">Canceled</option>
                        <option value="On Hold">On Hold</option>
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

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="proposal_date">Proposal Date<span class="text-red-600">*</span></label>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input id="proposal_date" datepicker="" datepicker-format="yyyy/mm/dd" type="text" name="proposal_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 {{ $errors->has('proposal_date') ? ' is-invalid' : '' }}" data-toggle="datetimepicker"
                    data-target="#datetimepicker" placeholder="Select date" value="{{old('proposal_date', $project->proposal_date)}}">
            </div>
            @if($errors->has('proposal_date'))
            <div class="text-red-600">{{$errors->first('proposal_date')}}</div>
            @endif
        </div>

        <div class="grid flex justify-between grid-cols-1 gap-4 my-3">
            <div>
                <label class="font-bold text-lg" for="description">Description</label>
            </div>
            <div class="col-span-5">
                <input id="description" type="text"
                    class="relative outline-none border border-gray-400 rounded py-3 px-3 w-full bg-white shadow text-sm text-gray-700 focus:outline-none focus:shadow-outline {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" value="{{old('description', $project->description)}}" />
                @if($errors->has('description'))
                <div class="text-red-600 italic">{{ $errors->first('description') }}</div>
                @endif
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
            Tambah
        </button>
        <a href="{{ url('admin/project') }}"
            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-5 rounded">
            Batal
        </a>
    </div>
</form>
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/datepicker.bundle.js"></script>

@endsection
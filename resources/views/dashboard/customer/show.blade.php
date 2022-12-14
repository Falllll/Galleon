@extends('dashboard.app')
@section('title', 'Customer')
@section('head', 'Customer')
@section('header', 'Customer')
@section('content')

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="">
                            <div class="relative right-0">
                                <div class="">
                                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                      <div class="flex-auto p-4 pt-6">
                                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                          <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                                            <div class="flex flex-col">
                                              <h6 class="mb-4 leading-normal text-xl">Customer Detail</h6> 
                                              <span class="mb-2 leading-tight text-sm">Customer ID: <span class="font-semibold text-slate-700 sm:ml-2">{{ $customer->id }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer Name: <span class="font-semibold text-slate-700 sm:ml-2">{{ $customer->name }}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Customer Email:
                                                <span class="font-semibold text-slate-700 sm:ml-2">
                                                    @if (empty($customer->email))                                                             
                                                        <span class="text-red-600">
                                                            Tidak Ada Email                                         
                                                        </span>                                        
                                                    @else
                                                        {{$customer->email}}
                                                    @endif
                                                </span>
                                              </span>
                                              <span class="mb-2 leading-tight text-sm">Customer Phone:
                                                <span class="font-semibold text-slate-700 sm:ml-2">
                                                    @if (empty($customer->phone))                                                             
                                                    <span class="text-red-600">
                                                        Tidak Ada No Telepon                                          
                                                    </span>                                         
                                                    @else
                                                        {{$customer->phone}}
                                                    @endif
                                                </span>
                                              </span>
                                              <span class="mb-2 leading-tight text-sm">Customer Address:
                                                <span class="font-semibold text-slate-700 sm:ml-2">
                                                    @if (empty($customer->address))  
                                                    <span class="text-red-600">
                                                        Tidak Ada alamat                                          
                                                    </span>                                                           
                                                    @else
                                                        {{$customer->address}}
                                                    @endif
                                                </span>
                                              </span>
                                              <span class="mb-2 leading-tight text-sm">Customer Status:
                                                <span class="font-semibold text-slate-700 sm:ml-2">
                                                    @if ($customer->is_active == 1)
                                                    Active
                                                    @else
                                                    Non-Active
                                                    @endif
                                                </span>
                                              </span>
                                              <span class="mb-2 leading-tight text-sm">Project:
                                                <span class="font-semibold text-slate-700 sm:ml-2">
                                                    
                                                    <ul>
                                                        @foreach ($customer->projects as $data)
                                                           
                                                            <li class="p-1">
                                                                - <a class="underline" href="{{ url('dashboard/project') }}/{{ $data->id }}">{{ $data->name }}</a>                                                                
                                                            </li> 
                                                           
                                                        @endforeach
                                                    </ul>
                                                </span>
                                              </span>
                                              <span class="mb-2 leading-tight text-sm">Created At: <span class="font-semibold text-slate-700 sm:ml-2">{{ date("d F Y", strtotime($customer->created_at))}}</span></span>
                                              <span class="mb-2 leading-tight text-sm">Updated At: <span class="font-semibold text-slate-700 sm:ml-2">{{ date("d F Y", strtotime($customer->updated_at))}}</span></span>
                                            </div>
                                            <div class="ml-auto text-right">
                                              {{-- <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a> --}}
                                              <a href="{{url('dashboard/customer')}}/{{$customer->id}}/{{'edit'}}" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
                                            </div>
                                          </li>

                                        </ul>
                                      </div>
                                    </div>
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

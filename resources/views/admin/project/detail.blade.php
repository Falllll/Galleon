<div id="" class="" x-show="openTab === 1">
    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
        <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
            <div class="flex flex-col">
                <h6 class="mb-4 leading-normal text-xl">Project Detail</h6>
                <span class="mb-2 leading-tight text-sm">Project Name:
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        {{ $project->name }}
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Project Description:
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        @if (empty($project->description))                                                             
                            <span class="text-red-600">
                                Tidak Ada Deskripsi                                          
                            </span>                                         
                        @else
                            {{$project->description}}
                        @endif
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Proposal Date: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        {{ date('d F Y', strtotime($project->proposal_date)) }}
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Project Status: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        {{ $project->status }}
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Customer: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        @if (empty($project->customer->name))                                                             
                            <span class="text-red-600">
                                Tidak Ada Customer,  <a href="{{ url('admin/project') }}/{{ $project->id }}/{{ 'edit' }}" class="underline text-blue-600">Tambahkan!</a>                                          
                            </span>                                         
                        @else
                            {{$project->customer->name}}
                        @endif
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Customer Email: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        @if (empty($project->customer->email))                                                             
                            <span class="text-red-600">
                                Tidak Ada Email                                          
                            </span>                                         
                        @else
                            {{$project->customer->email}}
                        @endif
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Customer Phone: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        @if (empty($project->customer->phone))                                                             
                            <span class="text-red-600">
                                Tidak Ada No Telepon                                          
                            </span>                                         
                        @else
                            {{$project->customer->phone}}
                        @endif
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Customer Address:
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        @if (empty($project->customer->address))                                                             
                            <span class="text-red-600">
                                Tidak Ada Alamat                                          
                            </span>                                         
                        @else
                            {{$project->customer->address}}
                        @endif
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Created At: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        {{ date('d F Y', strtotime($project->created_at)) }}
                    </span>
                </span>
                <span class="mb-2 leading-tight text-sm">Updated At: 
                    <span class="font-semibold text-slate-700 sm:ml-2">
                        {{ date('d F Y', strtotime($project->updated_at)) }}
                    </span>
                </span>
            </div>
            <div class="ml-auto text-right">
                {{-- <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" href="javascript:;"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text"></i>Delete</a> --}}
                <a href="{{ url('admin/project') }}/{{ $project->id }}/{{ 'edit' }}"
                    class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700"
                    href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</a>
            </div>
        </li>

    </ul>
</div>

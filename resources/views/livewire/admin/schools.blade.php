<div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <div class="search_table">
            <form class="form-inline my-2 mb-3 justify-content-center">
                <div class="w-100">
                    <input type="text" wire:model="NameOrEmail" class="w-100 form-control product-search br-30"
                        id="input-search" placeholder="Search by Title">
                    {{-- <button class="btn btn-primary" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button> --}}
                </div>
            </form>
        </div>

        @if ($guard == 'suppliers')
            <a href="{{ route('create-events-view') }}" class="btn btn-success margin_res">Add Supplier</a>
        @endif

    </div>

    <table class="table table-bordered table-hover table-striped mb-4 admin_table">
        <thead>
            <tr>
                <th>image</th>
                <th>name En</th>
                <th>name Ar</th>
                <th>email</th>
                <th class="text-center">Status</th>

                <th class="text-center">Actions</th>



            </tr>
        </thead>
        <tbody>
            @if ($Users == null)
                <p>no Users</p>
            @else
                @foreach ($Users as $user)
                    <tr>

                        <td><img src="{{ asset($user->image) }}" alt="" style="width: 50px"></td>
                        <td>{{ $user->name('en') }}</td>
                        <td>{{ $user->name('ar') }}</td>
                        <td>{{ $user['email'] }}</td>
                        @if ($active == true)
                            <td class="text-center"><button wire:click="Deactivate({{ $user['id'] }})"
                                    class="btn btn-danger">Deactivate</button></td>
                        @else
                            <td class="text-center"><button wire:click="Activate({{ $user['id'] }})"
                                    class="btn btn-primary">Activate</button></td>
                        @endif
                        @if ($guard == 'suppliers')
                            <td class="text-center elpsis_controls">

                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div><a href="" class="btn btn-success mb-2" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Edit"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a></div>
                                    <div><a href="javascript:void(0);" class="btn btn-danger mb-2" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Delete"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                            </svg></a></div>
                                    <div><a href="" class="btn btn-primary mb-2">Services</a></div>
                                </div>
                            </td>
                        @else
                            <td class="text-center"><a href="{{ route('school-details', $user['id']) }}"
                                    class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                        @endif

                    </tr>
                @endforeach
            @endif



        </tbody>
    </table>
    <div class="d-flex">
        <div class="justify-content-center">
            @if ($Users != null)
                @if ($Users->links('livewire.admin-pagination'))
                    {{ $Users->links('livewire.admin-pagination') }}
                @endif
            @endif



        </div>
    </div>
</div>

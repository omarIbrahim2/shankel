<div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">


        <a href="{{ route('areas-create-form', $City->id) }}" class="btn btn-success margin_res">Add new area</a>
    </div>

    <table class="table table-bordered table-hover table-striped mb-4 admin_table">
        <thead>
            <tr>
                <th>name En</th>
                <th>name Ar</th>
                <th class="text-center">Actions</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($Areas as $area)
                <tr>

                    <td class="elpsis">{{ $area->name('en') }}</td>
                    <td class="elpsis">{{ $area->name('ar') }}</td>
                    <td class="text-center elpsis_controls">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div><a href="{{ route('areas-update-form', $area->id) }}" class="btn btn-success mb-2"
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg></a></div>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    <div class="d-flex">
        <div class="justify-content-center">
            @if ($Areas->links('livewire.admin-pagination'))
                {{ $Areas->links('livewire.admin-pagination') }}
            @endif
        </div>
    </div>
</div>

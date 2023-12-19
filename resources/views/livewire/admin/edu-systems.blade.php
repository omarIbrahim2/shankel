<div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
        <a href="{{ route('eduSystems-create-form') }}" class="btn btn-success margin_res">Add new education system</a>
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

            @foreach ($eduSystems as $eduSystem)
                <tr>

                    <td class="elpsis">{{ $eduSystem->name('en') }}</td>
                    <td class="elpsis">{{ $eduSystem->name('ar') }}</td>
                    <td class="text-center elpsis_controls">

                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div><a href="{{ route('eduSystems-update-form', $eduSystem->id) }}" class="btn btn-success mb-2"
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg></a></div>
                            <div><a href="{{ route('eduSystem-delete', $eduSystem->id) }}" class="btn btn-danger mb-2"
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg></a></div>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    
</div>

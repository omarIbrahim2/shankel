

<div class="table-responsive">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
    <a href="{{ route('social-add-view') }}" class="btn btn-success mb-sm-3 margin_res">Add Social</a>

    </div>
    <table class="table table-bordered table-hover table-striped mb-4 admin_table">
        <thead>
            <tr>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>LinkedIn</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address En</th>
                <th>Address Ar</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($Social == null)
                <p>no Socials</p>
            @else
            <tr>

            <td>
                <a href="{{ $Social->facebook}}">{{ $Social->facebook}}</a>
            </td>
            <td><a href="{{ $Social->twitter }}">{{ $Social->twitter }}</a></td>
            <td><a href="{{ $Social->instagram}}">{{ $Social->instagram }}</a></td>
            <td><a href="{{ $Social->Linkedin}}">{{ $Social->Linkedin }}</a></td>
            <td><a href="{{ $Social->email }}">{{ $Social->email }}</a></td>
            <td>{{ $Social->phone }}</td>
            <td>{{ $Social->address('en') }}</td>
            <td>{{ $Social->address('ar') }}</td>
            <td class="text-center elpsis_controls">

                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    <div><a href="{{route('social-update-view' , $Social->id)}}" class="btn btn-success mb-2"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></div>
                    <div><a href="{{route('social-delete' , $Social->id)  }}" class="btn btn-danger mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></div>
                </div>
                </td>


        </tr>
            @endif



        </tbody>
    </table>
     </div>
  </div>







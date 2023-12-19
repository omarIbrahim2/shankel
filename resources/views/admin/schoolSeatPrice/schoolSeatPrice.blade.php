@extends('admin.layout')



@section('content')
    <div class="row pt-3">
        <div class="col-12 filtered-list-search mx-auto">

            <h1 class="grid_title">School Seat Price</h1>

            
            <div class="table-responsive">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                </div>
            
                <table class="table table-bordered table-hover table-striped mb-4 admin_table">
                    <thead>
                        <tr>
                            <th>seat_price</th>
                            
                            <th class="text-center">Actions</th>
            
                        </tr>
                    </thead>
                    <tbody>
            
                      
                            <tr>
            
                                <td class="elpsis">{{ $schoolSeat->seat_price }}</td>

                                <td class="text-center elpsis_controls">

                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div><a href="{{ route('school-seat-edit', $schoolSeat->id) }}" class="btn btn-success mb-2"
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
                                     
                                
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
@endsection

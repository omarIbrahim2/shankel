@extends('admin.layout')


@section('content')
    <h1 class="grid_title">Profile</h1>

    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <input type="hidden" name="id" value="{{ $AuthUser->id }}">
            <label for="event-title">email</label>
            <input name="email" id="event-title" value="{{ $AuthUser->email }}" type="text" class="form-control"
                placeholder="email">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary mt-4">Edit</button>
        <a href="{{ route('changePass-admin') }}" class="btn btn-primary mt-4">Reset Password</a>

    </form>



    </div>
@endsection

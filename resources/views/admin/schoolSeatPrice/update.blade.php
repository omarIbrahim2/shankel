@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Seat Price</h1>

    <form action="{{route('school-seat-update')}}" method="POST">
            @csrf
        <input type="hidden" name="id" value="{{$price->id}}">
        <div class="form-group mb-4">
            <label for="event-name">price</label>
                <input name="seat_price" id="event-name" value="{{$price->seat_price}}" type="number" class="form-control"  placeholder="seat price">
                @error('seat_price')
                <p class="text-danger">{{$message}}</p>
                @enderror
        
            </div>
        
            <button type="submit" class="btn btn-primary mt-4">Update</button>

    </form>

 </div>


@endsection

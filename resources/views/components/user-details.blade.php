<div class="row mt-5">
    <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">

        <h1>{{ $guard }}</h1>


        <div class="container mt-5">


            <div class="row">
                @foreach ($attrs as $attr => $val)
                    <div class="col-md-4 m-3">
                        @if ($attr == 'image')
                            <h5>{{ $attr }} :</h5> <img src="{{ asset($val) }}" alt="" style="width: 70px">
                        @else
                            <h5>{{ $attr }} :</h5> <p class=" text-primary">{{ $val }}</p>
                        @endif

                    </div>
                @endforeach

            </div>




        </div>

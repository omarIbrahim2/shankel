<div class="row mt-5 not-row">
    <div class="col-lg-12 col-md-12 col-sm-12 filtered-list-search mx-auto">

        <h1 class="grid_title">{{ $guard }}</h1>


        <div class="container mt-5">


            <div class="row not-row">
                @foreach ($attrs as $attr => $val)
                    @if ($attr == 'image')
                        <div class="col-12 text-center mb-3"> <img src="{{ asset($val) }}" class="img-fluid profile_img"
                                alt="" style="width: 200px"></div>
                    @else
                        <div class="col-md-4 my-3">

                            <div class="text-center card">
                                <h5>{{ $attr }}</h5>
                                @if($val != null)
                                <p class=" text-primary">{{ $val }}</p>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


    </div>

</div>

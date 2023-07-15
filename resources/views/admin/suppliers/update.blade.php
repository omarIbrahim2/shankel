@extends('admin.layout')


@section('content')
    <div class="container mt-3">
        <h1 class="grid_title">update Supplier</h1>


        <x-supplier-form actionRoute="supplier-update" :Supplier="$Supplier" :cities="$cities" update=true></x-supplier-form>
    </div>
@endsection

@section('scripts')
    <script>
        $("#selectCity").on('change', function() {
            let cityId = this.value;
            var url = '{{ route('areas', ':id') }}';
            url = url.replace(':id', cityId);

            $.ajax({
                type: 'GET',

                url: url,

                processData: false,

                contentType: 'application/json',

                cache: false,

                success: function(data) {
                    var your_html = "";
                    $("#areaSelect").empty();
                    $("#areaSelect").append("<option selected disabled>Area</option>");
                    for (const key in data.areas) {


                        your_html += "<option id='ar' value = " + data.areas[key].id + ">" + data.areas[
                            key].name + "</option>";
                    }
                    $("#areaSelect").append(your_html);

                }

            })

        })
    </script>
@endsection

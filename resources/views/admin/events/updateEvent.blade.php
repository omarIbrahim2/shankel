@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Event</h1>

    <x-event-form actionRoute="update-event" :Event="$Event"  :cities="$cities" update=true></x-event-form>
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

        ClassicEditor
    .create(document.querySelector( '#event-desc-ar' ) , {
        language: 'ar'
    })

    .catch(error=>{
       console.error( error );
    })



    ClassicEditor
    .create(document.querySelector( '#event-desc-en' ))
    .catch(error2=>{
        console.error( error );
    })
    </script>

@endsection

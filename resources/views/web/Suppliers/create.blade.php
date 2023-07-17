@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection


@section('main')
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
              <div class="m-auto">
                  <h2>{{ trans('supplier.addService') }}</h2>
              </div>
            <div class="contact-form black-contact-form">
                <form action="{{route('supplier-service-store')}}"  method="POST"  enctype="multipart/form-data">
                     @csrf
                    <input type="hidden" name="supplier_id" value="{{$supplierId}}" type="text">
                    @error('supplier_id')
                        <p>{{ $message }}</p>
                    @enderror
            
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class='font-bold' class='font-bold' for="event-title">{{ trans('service.name_en') }}</label>
                                <input name="name_en" id="event-title" value="{{ old('name_en') }}" type="text"
                                    class="form-control" placeholder="{{ trans('service.name_en') }}">
                                @error('name_en')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
            
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class='font-bold' class='font-bold' for="event-title">{{ trans('service.name_ar') }}</label>
                                <input name="name_ar" id="event-title" value="{{ old('name_ar') }}" type="text"
                                    class="form-control" placeholder="{{ trans('service.name_ar') }}">
                                @error('name_ar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
            
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class='font-bold' for="event-title">{{ trans('service.quantity') }}</label>
                                <input name="quantity" id="event-title" value="{{ old('quantity') }}" type="number"
                                    class="form-control" placeholder="{{ trans('service.quantity') }}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
            
                            </div>
                        </div>
            
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label class='font-bold' for="event-title">{{ trans('service.price') }}</label>
                                <input name="price" id="event-title" value="{{ old('price') }}" type="number"
                                    class="form-control" placeholder="{{ trans('service.price') }}">
                                @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
            
                            </div>
                        </div>
                    </div>
            
                    <div class="upload-avatar text-start">
                         <p id="imgName"></p>
                        <label for="eventImage" class="btn-custom">{{ trans('teacher.uploadNew') }} </label>
                        <input name="image" class="form-control py-2" id="eventImage" type="file" accept="image/*">
            
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <div class="form-group mb-4">
                        <label class='font-bold' for="event-desc_en">{{ trans('service.desc_en') }}</label>
                        <textarea name="desc_en" id="event-desc-en" cols="30" placeholder="{{ trans('service.desc_en') }}"
                            rows="10" class="form-control ">{{ old('desc_en') }}</textarea>
                        @error('desc_en')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <div class="form-group mb-4">
                        <label class='font-bold' for="event-desc-ar">{{ trans('service.desc_ar') }}</label>
                        <textarea name="desc_ar" id="event-desc-ar" cols="30" placeholder="{{ trans('service.desc_ar') }}"
                            rows="10" class="form-control ">{{ old('desc_ar') }}</textarea>
                        @error('desc_ar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
            
            
                    <button type="submit" class="btn-custom">{{ trans('service.add') }}</button>
            
            
                </form>
             </div>
        </div>
    </div>
</section>
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

                var lang = $('#startInn').data('langshankl')



                for (const key in data.areas) {

                    var name = JSON.parse(data.areas[key].name);
                    if (lang == 'ar') {
                        your_html += `<option id='ar' value =`+ data.areas[key].id + `>` + name
                            .ar + `</option>`;
                    } else {
                        your_html += `<option id='ar' value = `+ data.areas[key].id + `>` + name
                            .en + `</option>`;
                    }

                }
                $("#areaSelect").append(your_html);
                  
            }

        })
    })
</script>


<script>
    $('#eventImage').change(function() {

  var file = $('#eventImage')[0].files[0].name;
  $("#imgName").text(file);
   });
 </script>




<script>
       
    ClassicEditor
    .create(document.querySelector( '#event-desc-ar' ) , {
        language: 'ar'
    })
     
    .catch(error=>{
       console.error( error );
    })
</script> 

 <script>
    ClassicEditor
    .create(document.querySelector( '#event-desc-en' ))
    .catch(error2=>{
      
    })
</script>

@endsection

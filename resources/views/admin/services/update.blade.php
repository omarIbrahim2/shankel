@extends('admin.layout')


@section('content')
    <div class="container mt-3">
        <h1 class="grid_title">update Service</h1>

        <x-service-form actionRoute="service-update" :supplierId="$supplierId" :Service="$Service" update=true></x-service-form>

    </div>
@endsection


@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector( '#service.desc_ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
</script> 

<script>
   ClassicEditor
   .create(document.querySelector( '#service.desc_en' ))
   .catch(error2=>{
      console.error( error );
   })

</script>

@endsection
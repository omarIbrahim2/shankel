@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Add Service</h1>
     <x-service-form actionRoute="service-create"  :supplierId="$supplierId" ></x-service-form>
 </div>


@endsection

@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector( '#service_desc_ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
</script> 

<script>
   ClassicEditor
   .create(document.querySelector( '#service_desc_en' ))
   .catch(error2=>{
      console.error( error );
   })

</script>

@endsection
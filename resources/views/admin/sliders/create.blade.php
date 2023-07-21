@extends('admin.layout')


@section('content')
 <div class="container mt-3">
    <h1 class="grid_title">Add Slider</h1>
     <x-slider-form actionRoute="slider-create"></x-slider-form>
 </div>
@endsection


@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector('#info-en') , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
</script> 

<script>
   ClassicEditor
   .create(document.querySelector('#info-ar'))
   .catch(error2=>{
      console.error( error );
   })
   </script>
@endsection
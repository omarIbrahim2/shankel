@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Slider</h1>

    <x-slider-form actionRoute="slider-update" :Slider="$Slider" update=true></x-slider-form>
 </div>


@endsection


@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector('#info-ar') , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
</script> 

<script>
   ClassicEditor
   .create(document.querySelector('#info-en'))
   .catch(error2=>{
      console.error( error );
   })
   </script>
@endsection
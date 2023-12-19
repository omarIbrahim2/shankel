@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">Update Addvertisment</h1>

    <x-addvert-form actionRoute="update-addvert" :addvert="$addvert"  update=true></x-addvert-form>
 </div>


@endsection

@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector( '#addvert-desc-ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
</script> 

<script>
   ClassicEditor
   .create(document.querySelector( '#addvert-desc-en' ))
   .catch(error2=>{
      console.error( error );
   })
   </script>
@endsection
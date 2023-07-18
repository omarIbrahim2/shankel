@extends('admin.layout')


@section('content')

 <div class="container mt-3">
    <h1 class="grid_title">update Information</h1>

    <x-info actionRoute="info-update" :Info="$Info" update="true"></x-info>
 </div>


@endsection


@section('scripts')
<script>
       
   ClassicEditor
   .create(document.querySelector( '#info_mission_ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
 </script> 
 
 <script>
   ClassicEditor
   .create(document.querySelector( '#info_mission_en' ))
   .catch(error2=>{
      console.error( error );
   })
 
 </script>
 
 <script>
        
   ClassicEditor
   .create(document.querySelector( '#info_vision_ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
 </script> 
 
 <script>
   ClassicEditor
   .create(document.querySelector( '#info_vision_en' ))
   .catch(error2=>{
      console.error( error );
   })
 
 </script>
 
 <script>
        
   ClassicEditor
   .create(document.querySelector( '#info_choose_ar' ) , {
       language: 'ar'
   })
    
   .catch(error=>{
      console.error( error );
   })
 </script> 
 
 <script>
   ClassicEditor
   .create(document.querySelector( '#info_choose_en' ))
   .catch(error2=>{
      console.error( error );
   })
 
 </script>
 
 @endsection
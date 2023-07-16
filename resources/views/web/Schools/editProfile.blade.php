@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
           @livewire('school.edit-school-profile' , [ 'eSystems' => $eSystems , 'Cities' => $Cities])
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script>
       
    ClassicEditor
    .create(document.querySelector( '#desc_ar' ) , {
        language: 'ar'
    })
     
    .catch(error=>{
       console.error( error );
    })
</script> 

 <script>
    ClassicEditor
    .create(document.querySelector( '#desc_en' ))
    .catch(error2=>{
      
    })
</script>


<script>
       
    ClassicEditor
    .create(document.querySelector( '#mission_ar' ) , {
        language: 'ar'
    })
     
    .catch(error=>{
       console.error( error );
    })
</script> 

 <script>
    ClassicEditor
    .create(document.querySelector( '#mission_en' ))
    .catch(error2=>{
      
    })
</script>

<script>
       
    ClassicEditor
    .create(document.querySelector( '#vision_ar' ) , {
        language: 'ar'
    })
     
    .catch(error=>{
       console.error( error );
    })
</script> 

 <script>
    ClassicEditor
    .create(document.querySelector( '#vision_en' ))
    .catch(error2=>{
      
    })
</script>
    
@endsection


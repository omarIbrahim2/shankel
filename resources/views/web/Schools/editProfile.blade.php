@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
           @livewire('school.edit-school-profile' , [ 'grades' => $grades , 'eSystems' => $eSystems])
        </div>
    </div>
</section>

@endsection

@section('scripts')

<script>
       
    ClassicEditor
    .create(document.querySelector( '#editorar' ) , {
        language: 'ar'
    })
     
    .catch(error=>{
       console.error( error );
    })
</script> 

 <script>
    ClassicEditor
    .create(document.querySelector( '#editoren' ))
    .catch(error2=>{
      
    })
</script> 
    
@endsection


@extends('web.layout')

@section('nav')
 <x-nav-auth></x-nav-auth>
@endsection



@section('main')
    
<section class="section edit-teacher-profile">
    <div class="inner">
        <div class="container">
            @livewire('supplier.edit-profile')
        </div>
    </div>
</section>

@endsection

@section('scripts')
    
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


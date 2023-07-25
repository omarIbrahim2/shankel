@extends('web.layout')

@section('title')
    Shankl | Supplier Services
@endsection

@section('nav')
    <x-nav-auth></x-nav-auth>
@endsection

@section('main')

    @livewire('web.suppliers.supplier-services')

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

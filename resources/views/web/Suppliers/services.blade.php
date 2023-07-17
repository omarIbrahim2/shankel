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
    $(".get ").on("click",function(){
         
        let id = $(this).attr("data-service-id");
        let price = $(this).attr("data-price");
        let nameEn = $(this).attr("data-ser-nameen");
        let nameAr = $(this).attr("data-ser-namear");
        let descEn = $(this).attr("data-ser-descen");
        let descAr = $(this).attr("data-ser-descar");
        let quantity = $(this).attr("data-quatntity");
        

          $('#serId').val(id)
         $("#serNameEn").val(nameEn)
         $("#serNameAr").val(nameAr)
         $("#serPrice").val(price)
         $("#serQuantity").val(quantity)
         $("[role=textbox]").val(descEn)
         $("#event-desc-ar").val(descAr)
         

        
    })
</script>
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

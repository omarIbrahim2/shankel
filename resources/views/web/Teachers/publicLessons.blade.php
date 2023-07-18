@extends('web.layout')

@section('title')
    Shankal | Public Lessons
@endsection


@section('nav')
<x-nav-auth></x-nav-auth>
@endsection



@section('main')

    @livewire('web.teachers.public-lessons')
     
@endsection


@section('scripts')

<script>
     $('.get').on('click' , function(){
           
        var title_en = $(this).attr('data-title-en');
        var title_ar = $(this).attr('data-title-ar');
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');

        $("#lesson-title_en").val(title_en);
        $("#lesson-title_ar").val(title_ar);
        $("#lesson-url").val(url);
        $("#lesson-id").val(id);

     })

</script>

<script>

$('#lessonImage').change(function() {

var file = $('#lessonImage')[0].files[0].name;
$("#imgName").text(file);
 });
</script>
    
@endsection
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
           
        var title = $(this).attr('data-title');
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');

        $("#lesson-title").val(title);

        $("#lesson-url").val(url);
        $("#lesson-id").val(id);

     })

</script>
    
@endsection
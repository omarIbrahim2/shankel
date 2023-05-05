@extends('web.layout')
@section('nav')
    <x-nav-guest/>
@endsection

@section('main')
<main class="colored-section">
   
    <section class="section select-user">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>Select User</h2>
                </div>
                <div class="user-levels">
                    <a href="{{route('parent_register')}}" class="user-level">
                        <div class="level-img">
                            <img src="assets/images/user/Group.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Parent</h3>
                        </div>
                    </a>
                    <a href="#" class="user-level">
                        <div class="level-img">
                            <img src="assets/images/user/Vector.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Supplier</h3>
                        </div>
                    </a>
                    <a href="{{route('school_register')}}" class="user-level">
                        <div class="level-img">
                            <img src="assets/images/user/Vector2.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>school</h3>
                        </div>
                    </a>
                    <a href="{{route('teacher_register')}}" class="user-level">
                        <div class="level-img">
                            <img src="assets/images/user/teach.png" alt="level">
                        </div>
                        <div class="level-name">
                            <h3>Teacher</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
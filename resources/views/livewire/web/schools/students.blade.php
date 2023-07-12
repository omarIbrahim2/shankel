<div>
    <section class="section edit-teacher-profile">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>{{ trans('school.students') }}</h2>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach ($Students as $student)
                        <div class="col-md-4 col-12">
                            <div class="teacher-item">
                                <div class="teacher-item-img">
                                    <img width="250px" src="{{ $student->image ? asset('assets/images/user/Vector2.png')  :  asset("'uploads.' $student->image") }}" alt="{{ $student->name }}">
                                </div>
                                <div class="teacher-item-data">
                                        <h3>{{ $student->name }}</h3>
                                        <h5>{{ $student->gender }}</h5>
                                        <h4>{{ $student->grade->name() }}</h4>
                                        
                                        <p><i class="fa-solid fa-location-dot"></i> {{ $student->parentt->area->name() }}</p>

                                </div>
                            </div>
                        </div>  
                        @endforeach
                        <div class="pagination">
                            @if ($Students->links('livewire.web-pagination'))
                                {{ $Students->links('livewire.web-pagination') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
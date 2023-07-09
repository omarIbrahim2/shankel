<section class="section">
    <div class="inner">

        <div>
            <div class="service-banner school-banner">
                <div class="page-search">
                    <input wire:model="searchSchool" type="text" class="search-input"
                        placeholder="{{ trans('school.search') }}">
                    <span><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </div>


            <div class="section-content section">
                <div class="container">
                    <div class="section-title">
                        <h2>Schools in your area</h2>
                    </div>
                    <div class="area-container ">

                        <div class="area-content">
                            <div class="row">

                                @if ($Schools == null)
                                @else
                                    @foreach ($Schools as $school)
                                        <div class="col-md-4 col-12 search-resault">
                                            <a href="{{ route('school-by-id', $school->id) }}">
                                                <div class="area-school school-card">
                                                    <div class="area-school-img">
                                                        <img src="{{ $school->image == null ? asset('assets/images/school/1.webp') : asset($school->image) }}"
                                                             alt="school">
                                                    </div>
                                                    <div class="area-school-name search-label">
                                                        <h4>{{ $school->name }}</h4>
                                                        <p class=" text-primary">{{$school->type}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pagination">
                @if ($Schools == null)
                @else
                    @if ($Schools->links('livewire.web-pagination'))
                        {{ $Schools->links('livewire.web-pagination') }}
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>

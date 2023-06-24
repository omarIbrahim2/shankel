<section class="section">
    <div class="inner">
        <div class="container">
            <div class="services-container">
                <div class="service-item">
                    <div class="row">
                        @foreach ($lessons as $lesson)
                            
                        
                        <div class="col-md-2 col-12 mb-2">
                            <div class="service-item-img">
                                <img src="{{ $lesson->image ? asset('assets/images/suplliers/1.webp') : asset('uploads/'.$school->image) }}" alt="service">
                            </div>
                            
                        </div>
                        <div class="col-md-10 col-12 mb-2">
                            <div class="service-item-data">
                                <div class="service-text">
                                    <div class="tags">
                                        <a href="#" class="tag rounded-pill btn-custom">{{ $lesson->teacher->field }}</a>
                                        
                                    </div>
                                    <div class="service-item-title free-title">
                                        <h3>{{ $lesson->title }}</h3>
                                    </div>
                                    
                                </div>
                                <div class="service-booking">
                                    <a href="{{ $lesson->url }}" class="btn-custom">{{ trans('teacher.watchNow') }}</a>
                                    <div class="m-2">
                                        <form action="{{ route('delete-lesson' , $lesson->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class=" px-4 btn btn-danger">{{ trans('teacher.delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                        @endforeach
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>
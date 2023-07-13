<div>
    <section class="section">
        <div class="inner">
            <div class="container">
                <div class="services-container">
                    @foreach ($Services as $service)
                    <div class="service-item">
                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="service-item-img">
                                    <img src="{{asset($service->image)}}" alt="service">
                                </div>
                            </div>
                            <div class="col-md-10 col-12">
                                <div class="service-item-data">
                                    <div class="service-text">
                                        <div class="tags">
                                            <a href="#" class="tag rounded-pill btn-custom">{{$service->name}}</a>
                                            <a href="#" class="price">{{$service->price}} JOD</a>
                                        </div>
                                        <div class="service-item-title">
                                            
                                            <h3>{{$service->supplier->name}}</h3>
                                        </div>
                                        <div class="service-item-description">
                                            {{$service->desc}}
                                         </div>
                                    </div>
                                    <div class="service-booking">
                                        <div class="m-2">
                                            <form action="{{route('supplier-service-delete' , $service->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class=" px-4 btn btn-danger">{{ trans('teacher.delete') }}</button>
                                            </form>
                                        </div>
                                        <button type="button" class="get btn btn-warning"data-bs-toggle="modal" data-bs-target="#teacherVideos">{{trans('teacher.update')}}</button>
                                    </div>

                                </div>
                               
                            </div>
                            
                          
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="pagination">
                @if ($Services == null)
                    
                @else
                @if ($Services->links("livewire.web-pagination"))
                {{$Services->links("livewire.web-pagination")}}
                @endif
                @endif
            </div>
        </div>
    </section>
</div>

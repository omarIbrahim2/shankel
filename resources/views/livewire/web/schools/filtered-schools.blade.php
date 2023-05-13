<div>
    <div class="service-banner school-banner">
        <div class="page-search">
            <input wire:model="searchSchool" type="text" class="search-input" placeholder="Search by Name Or Email">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
    </div>
    <div class="section-content section">
        <div class="container">
            <div class="area-container ">
                
                <div class="area-content">
                    <div class="row">

                        @if ($Schools == null)
                                                        
                        @else
                        @foreach ($Schools as $school)
                            
                        
                        <div class="col-md-4 col-12 search-resault">
                            <a href="{{route("school-by-id" , $school->id)}}">
                                <div class="area-school school-card">
                                    <div class="area-school-img">
                                        <img src="{{$school->image == null ? asset("assets/images/school/1.webp") : asset($school->image)}}" @style('width:150px') alt="school">
                                    </div>
                                    <div class="area-school-name search-label">
                                        <h4>{{$school->name}}</h4>
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
    <!-- <div class="pagination">
        <ul>
            <li><a href="#">previous</a></li>
            <li><a class="active" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#">next</a></li>
        </ul>
    </div> -->

    {{-- <div class="pagination">
        @if ($Schools == null)
            
        @else
        @if ($Schools->links("livewire.web-pagination"))
        {{$Schools->links("livewire.web-pagination")}}
        @endif
        @endif
    </div> --}}
</div>
<div>

 
<div class="section-content">
    <div class="container">
        <div class="ads">
 @foreach ($addverts as $addvert)
    <div class="row m-0 ">
        <div class="col-md-6 col-12 m-0 p-0">
            <div class="ads-item">
                <div class="ads-image">
                    <img src="{{ $addvert->image }}"  alt="provider">
                </div>
            </div>
        </div>
        <div class="col-md-6 colored-ad col-12 m-0 p-0">
            <div class="ads-item">
                <div class="ads-info">
                    <h4>{{ $addvert->title }}</h4>
                    <p>{{ $addvert->desc }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach 
     
        
        
   

<div class="pagination">
    <div class="d-flex">
        <div class="justify-content-center">
            @if ($addverts->links("livewire.admin-pagination"))
                {{$addverts->links("livewire.admin-pagination")}}
            
            @endif
        </div>
   </div>
</div>

</div>


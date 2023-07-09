<div>
    <div class="service-banner supplier-banner">
        <div class="page-search">
            <input wire:model="searchSupplier" type="text" class="search-input" placeholder="{{ trans('supplier.search') }}">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
    </div>
    <div class="section-content section">
        <div class="container">
            <div class="area-container ">

                <div class="area-content">
                    <div class="row">

                        @if ($Suppliers == null)

                        @else
                        @foreach ($Suppliers as $supplier)


                        <div class="col-md-4 col-12 search-resault">
                            <a href="{{route('supplier-by-id' , $supplier->id)}}">
                                <div class="area-supplier supplier-card">
                                    <div class="area-supplier-img">
                                        <img src="{{$supplier->image == null ? asset('assets/images/supplier/1.webp') : asset($supplier->image)}}" @style('width:150px') alt="supplier">
                                    </div>
                                    <div class="area-supplier-name search-label">
                                        <h4>{{$supplier->name}}</h4>
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

</div>

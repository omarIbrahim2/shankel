    <section class="section edit-teacher-profile empty">
        <div class="inner">
            <div class="container">
                <div class="section-title">
                    <h2>{{ trans('supplier.suppliers') }}</h2>
                </div>
                <div class="section-content">
                    <div class="row">
                        @foreach ($suppliers as $supplier)
                        <div class="col-md-4 col-12">
                            <div class="teacher-item-wrapper">
                            <div class="teacher-item">
                                <div class="teacher-item-img">
                                    <img src="{{ asset($supplier->image) }}" alt="teacher">
                                </div>
                                <div class="teacher-item-data">
                                    @if ($supplier->name)
                                        
                                    <h3>{{ $supplier->name() }}</h3>
                                    @endif
                                    @if ($supplier->type)
                                        
                                    <h5>{{ $supplier->type() }}</h5>
                                    @endif
                                       @if ($supplier->orgName)    
                                       <h4>{{ $supplier->orgName()}}</h4>
                                       @endif
                                       @if ($supplier->area)
                                           
                                       <p><i class="fa-solid fa-location-dot"></i> {{ $supplier->area->name() }}</p>
                                       @endif

                                        <a href="{{ route('supplier-by-id', $supplier->id) }}"
                                            class="btn-custom">{{ trans('teacher.seeMore') }}</a>

                                        </div>
                                </div>
                            </div>
                            </div>
                        @endforeach
                        <div class="pagination">
                            @if ($suppliers->links('livewire.web-pagination'))
                                {{ $suppliers->links('livewire.web-pagination') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

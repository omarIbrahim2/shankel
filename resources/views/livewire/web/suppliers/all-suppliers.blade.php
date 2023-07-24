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
                            <div class="teacher-item">
                                <div class="teacher-item-img">
                                    <img width="250px" src="{{ asset($supplier->image) }}" alt="teacher">
                                </div>
                                <div class="teacher-item-data">
                                        <h3>{{ $supplier->name() }}</h3>
                                        <h5>{{ $supplier->type() }}</h5>
                                        <h4>{{ $supplier->orgName()}}</h4>
                                        <p><i class="fa-solid fa-location-dot"></i> {{ $supplier->area->name() }}</p>

                                        <a href="{{ route('supplier-by-id', $supplier->id) }}"
                                            class="btn-custom">{{ trans('teacher.seeMore') }}</a>

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

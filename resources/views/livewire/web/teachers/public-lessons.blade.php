a<section class="section">
    <div class="inner">
        <div class="container">
            <div class="services-container">
                <div class="service-item">
                    <div class="row">
                        @foreach ($lessons as $lesson)
                            <div class="col-md-2 col-12 mb-2">
                                <div class="service-item-img">
                                    <img src="{{ asset($lesson->image) }}" alt="lesson">
                                </div>

                            </div>
                            <div class="col-md-10 col-12 mb-2">
                                <div class="service-item-data">
                                    <div class="service-text">
                                        <div class="tags">
                                            <a href="#"
                                                class="tag rounded-pill btn-custom">{{ $lesson->teacher->field() }}</a>

                                        </div>
                                        <div class="service-item-title free-title">
                                            <h3>{{ $lesson->title() }}</h3>
                                        </div>

                                    </div>
                                    <div class="service-booking">
                                        <a href="{{ $lesson->url }}" target="_blank"
                                            class="btn-custom">{{ trans('teacher.watchNow') }}</a>
                                        <div class="m-2">
                                            <form action="{{ route('delete-lesson', $lesson->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class=" px-4 btn btn-danger">{{ trans('teacher.delete') }}</button>
                                            </form>
                                        </div>
                                        <button type="button" class="get btn btn-warning" data-id="{{ $lesson->id }}"
                                           data-title-ar="{{$lesson->title('ar')}}"  data-title-en="{{ $lesson->title('en')}}" data-url="{{ $lesson->url }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#teacherVideos">{{ trans('teacher.update') }}</button>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                        <div class="pagination">
                            @if ($lessons->links('livewire.web-pagination'))
                                {{ $lessons->links('livewire.web-pagination') }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="teacherVideos" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('teacher.lessons') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="container">
                                <h4>{{ trans('teacher.editLesson') }} </h4>
                                <form action="{{ route('update-lesson') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input id="lesson-id" type="hidden" name="id">
                                    <div class="input-item me-auto ms-0">
                                        <input name="title_en" id="lesson-title_en" type="text"
                                            value="{{ old('title_en') }}"
                                            placeholder="{{ trans('teacher.title_en') }}">
                                        <span>
                                            <i class="fa-solid fa-person-chalkboard"></i>
                                        </span>
                                        @error('title_en')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <input name="title_ar" id="lesson-title_ar"  type="text"
                                            value="{{ old('title_ar') }}"
                                            placeholder="{{ trans('teacher.title_ar') }}">
                                        <span>
                                            <i class="fa-solid fa-person-chalkboard"></i>
                                        </span>
                                        @error('title_ar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="input-item me-auto ms-0">
                                        <input name="url" id="lesson-url" type="text"
                                            value="{{ old('url') }}" placeholder="{{ trans('teacher.url') }}">
                                        <span>
                                            <i class="fa-solid fa-person-chalkboard"></i>
                                        </span>
                                        @error('url')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="upload-avatar text-start" data-upload-id="myFirstImage">
                                        <label for="lessonImage" class="btn-custom">{{ trans('teacher.uploadNew') }}
                                        </label>
                                        <p id="imgName"></p>
                                        <input name="image" class="form-control py-2" id="lessonImage" type="file"
                                            accept="image/*">

                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                         <img src="{{asset($lesson->image)}}" style="width: 50px" alt="lesson pic">
                                    </div>
                                    <div class="input-item me-auto ms-0">
                                        <button type="submit" class="custom-out-btn">
                                            {{ trans('event.update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

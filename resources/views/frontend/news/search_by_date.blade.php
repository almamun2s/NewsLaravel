@extends('frontend.body.main_layout')

@section('title', $formatDate)

@section('content')
    <div class="archive-page1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="archive-topAdd">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="rachive-info-cats">
                        <a href=" "><i class="las la-home"></i> </a> <i class="las la-chevron-right"></i> News of
                        {{ $formatDate }}
                    </div>


                    <div class="row">
                        @foreach ($allNews as $news)
                            <div class="archive1-custom-col-3">
                                <div class="archive-item-wrpp2">
                                    <div class="archive-shadow arch_margin">
                                        <div class="archive1_image2">
                                            <a href="{{ url("/news/$news->id/$news->title_slug") }}"><img class="lazyload"
                                                    src="{{ $news->getImg() }}"></a>
                                            <div class="archive1-meta">
                                                <a href="{{ url("/news/$news->id/$news->title_slug") }}"><i
                                                        class="la la-tags"> </i>
                                                    {{ str(translateThis($news->title))->limit(40) }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="archive1-padding">
                                            <div class="archive1-title2"><a
                                                    href="{{ url("/news/$news->id/$news->title_slug") }}">
                                                    {{ str(translateThis($news->title))->limit(40) }} </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    <div class="archive1-margin">
                        <div class="archive-content">
                            <div class="row">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <span aria-current="page" class="page-numbers current">1</span>
                            <a class="page-numbers" href=" ">2</a>
                            <a class="next page-numbers" href=" ">Next »</a>
                        </div>
                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-lg-12 col-md-12"></div>
                    </div>
                </div>


                @include('frontend.news.latestAndPopular')

            </div>
        </div>
    </div>


@endsection

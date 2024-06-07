@php
    $banner_home1 = App\Models\Banner::find(1);
    $banner_home2 = App\Models\Banner::find(2);
@endphp
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ $banner_home1->getImg() }}"
                            alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ $banner_home2->getImg() }}"
                            alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-two">
    <div class="container">
        <div class="secTwo-color">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="themesBazar_cat6">
                        <ul class="nav nav-pills" id="categori-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" id="categori-tab1" data-bs-toggle="pill"
                                    data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1"
                                    aria-selected="true">
                                    ALL
                                </div>
                            </li>
                            @php
                                $categories = App\Models\Category::limit(4)->get();
                            @endphp
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="{{ $category->slug }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#{{ $category->slug }}" role="tab"
                                        aria-controls="{{ $category->name }}" aria-selected="false">
                                        {{ $category->name }} </div>
                                </li>
                            @endforeach


                            <span class="themeBazar6"></span>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="Info-tabs1" role="tabpanel"
                            aria-labelledby="categori-tab1 ">
                            <div class="row">
                                @php
                                    $allNews = App\Models\NewsPost::latest()->limit(8)->get();
                                @endphp
                                @foreach ($allNews as $news)
                                    <div class="themesBazar-4 themesBazar-m2">
                                        <div class="sec-two-wrpp">
                                            <div class="section-two-image">
                                                <a
                                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                                            </div>
                                            <h5 class="sec-two-title">
                                                <a
                                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($categories as $category)
                            <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="categori-tab2">
                                <div class="row">

                                    @foreach ($category->news as $news)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                                </div>
                                                <h5 class="sec-two-title">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach



                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

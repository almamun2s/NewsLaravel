<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset('frontend/assets/images/biggapon-1.gif') }}" alt="" width="100%"
                            height="auto">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset('frontend/assets/images/biggapon-1.gif') }}" alt="" width="100%"
                            height="auto">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-seven">
    <div class="container">


        @php
            $category = App\Models\Category::skip(1)->first();
        @endphp
        <h2 class="themesBazar_cat01"> <a
                href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}
            </a> <span> <a href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}"> More
                    <i class="las la-arrow-circle-right"></i> </a></span> </h2>

        <div class="secSecven-color">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    @foreach ($category->news as $key => $news)
                        @if ($key == 0)
                            <div class="black-bg">
                                <div class="secSeven-image">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">
                                        <img class="lazyload" src="{{ $news->getImg() }}">
                                    </a>
                                </div>
                                <h6 class="secSeven-title">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                    </a>
                                </h6>
                                <div class="secSeven-details">
                                    {{ str(strip_tags($news->details))->limit(250) }}
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">
                                        More..</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="row">

                        @foreach ($category->news as $key => $news)
                            @if ($key > 0 && $key < 5)
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                    class="lazyload" src="{{ $news->getImg() }}"></a>
                                            <h5 class="secSeven-title2">
                                                <a
                                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

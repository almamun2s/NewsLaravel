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

<section class="section-five">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                @php
                    $category = App\Models\Category::skip(8)->first();
                @endphp
                <h2 class="themesBazar_cat01"> <a
                        href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                    <span> <a href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">
                            More
                            <i class="las la-arrow-circle-right"></i> </a></span>
                </h2>

                <div class="white-bg">
                    @foreach ($category->news as $key => $news)
                        @if ($key == 0)
                            <div class="secFive-image">
                                <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                                <div class="secFive-title">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($key > 0 && $key < 3)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <h5 class="secFive_title2">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                @php
                    $category = App\Models\Category::skip(4)->first();
                @endphp
                <h2 class="themesBazar_cat01"> <a
                        href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                    <span> <a href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">
                            More
                            <i class="las la-arrow-circle-right"></i> </a></span>
                </h2>

                <div class="white-bg">
                    @foreach ($category->news as $key => $news)
                        @if ($key == 0)
                            <div class="secFive-image">
                                <a
                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                                <div class="secFive-title">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($key > 0 && $key < 3)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <h5 class="secFive_title2">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                @php
                    $category = App\Models\Category::skip(5)->first();
                @endphp
                <h2 class="themesBazar_cat01"> <a
                        href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a>
                    <span> <a href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}">
                            More
                            <i class="las la-arrow-circle-right"></i> </a></span>
                </h2>

                <div class="white-bg">
                    @foreach ($category->news as $key => $news)
                        @if ($key == 0)
                            <div class="secFive-image">
                                <a
                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                                <div class="secFive-title">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        @if ($key > 0 && $key < 3)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <h5 class="secFive_title2">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

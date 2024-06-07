@php
    $banner_home3 = App\Models\Banner::find(3);
    $banner_home4 = App\Models\Banner::find(4);
@endphp
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ $banner_home3->getImg() }}"
                            alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ $banner_home4->getImg() }}"
                            alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @php
                    $category = App\Models\Category::skip(4)->first();
                @endphp
                <h2 class="themesBazar_cat07"> <a
                        href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}"> <i
                            class="las la-align-justify"></i>
                        {{ $category->name }}
                    </a> </h2>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @foreach ($category->news as $key => $news)
                            @if ($key == 0)
                                <div class="secThree-bg">
                                    <div class="sec-theee-image">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                class="lazyload" src="{{ $news->getImg() }}"></a>
                                    </div>
                                    <h4 class="secThree-title">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                        </a>
                                    </h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="bg2">
                            @foreach ($category->news as $key => $news)
                                @if ($key > 0 && $key < 4)
                                    <div class="secThree-smallItem">
                                        <div class="secThree-smallImg">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                    class="lazyload" src="{{ $news->getImg() }}"></a>
                                            <h5 class="secOne_smallTitle">
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
            <div class="col-lg-4 col-md-4">
                <div class="map-area" style="width:100%; background: #eff3f4;">
                    <div style="padding:5px 35px 0px 35px;">
                        <img class="lazyload" src="{{ asset('frontend/assets/images/lazy.jpg') }}"></a>
                        <br> <br>
                        <img class="lazyload" src="{{ asset('frontend/assets/images/lazy.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

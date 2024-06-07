<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset('frontend/assets/images/biggapon-1.gif') }}" alt="" width="100%"
                            height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset('frontend/assets/images/biggapon-1.gif') }}" alt="" width="100%"
                            height="auto"></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                            src="{{ asset('frontend/assets/images/biggapon-1.gif') }}" alt="" width="100%"
                            height="auto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-four">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                @php
                    $category = App\Models\Category::skip(5)->first();
                @endphp
                <h2 class="themesBazar_cat04"> <a
                        href="{{ route('category_news', ['id' => $category->id, 'slug' => $category->slug]) }}"> <i
                            class="las la-align-justify"></i>{{ $category->name }} </a> </h2>

                <div class="secFour-slider owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3294px, 0px, 0px); transition: all 1s ease 0s; width: 4792px;">

                            @foreach ($category->news as $news)
                                <div class="owl-item" style="width: 289.5px; margin-right: 10px;">
                                    <div class="secFour-wrpp ">
                                        <div class="secFour-image">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                    class="lazyload" src="{{ $news->getImg() }}"></a>
                                            <h5 class="secFour-title">
                                                <a
                                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ $news->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                class="las la-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="las la-angle-right"></i></button>
                    </div>
                    <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                            role="button" class="owl-dot active"><span></span></button></div>
                </div>
            </div>
        </div>
    </div>
</section>

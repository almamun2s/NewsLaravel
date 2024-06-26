<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">

        </div>
    </div>
</div>

<section class="themesBazar_section_one">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">



                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">

                                    @foreach ($topSliders as $news)
                                        <div class="owl-item" style="width: 506.25px; margin-right: 20px;">
                                            <div class="secOne_newsContent">
                                                <div class="sec-one-image">
                                                    <a
                                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                                    <h6 class="sec-small-cat">
                                                        <a href=" ">{{ $news->created_at->format('d M Y') }} </a>
                                                    </h6>
                                                    <h1 class="sec-one-title">
                                                        <a
                                                            href="{{ route('news_details', ['id' => $news->id, 'slug', $news->title_slug]) }}">
                                                            {{ str(translateThis($news->title))->limit(40) }}
                                                        </a>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="fa-solid fa-angle-left"></i></button>
                                <button type="button" role="presentation" class="owl-next"><i
                                        class="fa-solid fa-angle-right"></i></button>
                            </div>
                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                    role="button" class="owl-dot active"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button></div>
                        </div>


                    </div>
                    <div class="col-lg-5 col-md-5">

                        @foreach ($sectionThree as $news)
                            <div class="secOne-smallItem">
                                <div class="secOne-smallImg">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <h5 class="secOne_smallTitle">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="sec-one-item2">
                    <div class="row">

                        @foreach ($sectionNine as $news)
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="sec-one-wrpp2">
                                    <div class="secOne-news">
                                        <div class="secOne-image2">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                    class="lazyload" src="{{ $news->getImg() }}"></a>
                                        </div>
                                        <h4 class="secOne-title2">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}</a>
                                        </h4>
                                    </div>
                                    <div class="cat-meta">
                                        <a href=" "> <i
                                                class="lar la-newspaper"></i>{{ $news->created_at->format('d M Y') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">

                @if ($live->isActive)
                    <div class="live-item">
                        <div class="live_title">
                            <a href=" ">LIVE TV </a>
                            <div class="themesBazar"></div>
                        </div>
                        <div class="popup-wrpp">
                            <div class="live_image">
                                <img width="700" height="400" src="{{ $live->getImg() }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                    loading="lazy">
                                <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i>
                                </div>
                            </div>
                            <div class="live-popup">
                                <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles"
                                    aria-describedby="modal-contents">
                                    <div id="modal-contents">
                                        <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                            <iframe width="560" height="315" src="{{ $live->url }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px">{{ translateThis('Old News') }}</h3>
                </div>
                <form class="wordpress-date" action="{{ route('search_by_date') }}" method="post">
                    @csrf
                    <input type="date" placeholder="Select Date" name="date" class="hasDatepicker">
                    <input type="submit" value="Search">
                </form>
                <div class="recentPopular">
                    <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active" id="recent-tab" data-bs-toggle="pill"
                                data-bs-target="#recent" role="tab" aria-controls="recent"
                                aria-selected="false">{{ translateThis('Latest') }}</div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link" id="popular-tab" data-bs-toggle="pill" data-bs-target="#popular"
                                role="tab" aria-controls="popular" aria-selected="false">
                                {{ translateThis('Popular') }}</div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane active show  fade" id="recent" role="tabpanel" aria-labelledby="recent">
                        <div class="news-titletab">
                            @foreach ($latestNews as $news)
                                <div class="tab-image tab-border">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"
                                        class="tab-icon"><i class="la la-play"></i></a>
                                    <h4 class="tab_hadding"><a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}</a>
                                    </h4>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                        <div class="news-titletab">
                            @foreach ($popularNews as $news)
                                <div class="tab-image tab-border">
                                    <a
                                        href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                            class="lazyload" src="{{ $news->getImg() }}"></a>
                                    <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"
                                        class="tab-icon"><i class="la la-play"></i></a>
                                    <h4 class="tab_hadding"><a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}</a>
                                    </h4>
                                </div>
                            @endforeach




                        </div>
                    </div>
                </div>
                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <iframe src=" " width="260" height="170" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="themesBazar_widget">
                    <h3 style="margin-top:5px"> Our Like Page </h3>
                </div>
                <div class="facebook-content">
                    <div class="twitter-timeline twitter-timeline-rendered"
                        style="display: flex; width: 410px; max-width: 100%; margin-top: 0px; margin-bottom: 0px;">
                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true"
                            allowfullscreen="true" class=""
                            style="position: static; visibility: visible; width: 279px; height: 220px; display: block; flex-grow: 1;"
                            title="Twitter Timeline" src=" "></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

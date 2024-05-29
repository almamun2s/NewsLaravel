<div class="col-lg-4 col-md-4">
    <div class="sitebar-fixd" style="position: sticky; top: 0;">
        <div class="siteber-add">
            <div class="themesBazar_widget">
                <div class="textwidget">
                    <p><img loading="lazy" class="aligncenter size-full wp-image-74" src="assets/images/biggapon-1.gif"
                            alt="" width="100%" height="auto"></p>
                </div>
            </div>
        </div>
        <div class="singlePopular">
            <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent"
                        role="tab" aria-controls="archiveRecent" aria-selected="true">
                        {{ translateThis('Latest') }}
                    </div>
                </li>
                <li class="nav-item" role="presentation">
                    <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab"
                        aria-controls="archivePopulars" aria-selected="false">
                        {{ translateThis('Popular') }}
                    </div>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContentarchive">
            <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
                aria-labelledby="archiveRecent">

                <div class="archiveTab-sibearNews">
                    @foreach ($latestNews as $key => $news)
                        <div class="archive-tabWrpp archiveTab-border">
                            <div class="archiveTab-image ">
                                <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                            </div>
                            <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"
                                class="archiveTab-icon2"><i class="la la-play"></i></a>
                            <h4 class="archiveTab_hadding"><a
                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}</a>
                            </h4>
                            <div class="archive-conut"> {{ $key + 1 }} </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                <div class="archiveTab-sibearNews">

                    @foreach ($popularNews as $key => $news)
                        <div class="archive-tabWrpp archiveTab-border">
                            <div class="archiveTab-image ">
                                <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                        class="lazyload" src="{{ $news->getImg() }}"></a>
                            </div>
                            <a href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"
                                class="archiveTab-icon2"><i class="la la-play"></i></a>
                            <h4 class="archiveTab_hadding"><a
                                    href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str(translateThis($news->title))->limit(40) }}</a>
                            </h4>
                            <div class="archive-conut"> {{ $key + 1 }}</div>

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="siteber-add2">
        </div>
    </div>
</div>

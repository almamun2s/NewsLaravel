@extends('frontend.body.main_layout')

@section('title', $news->title)

@section('content')
    <section class="single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <div class="single-add">
                    </div>

                    <div class="single-cat-info">
                        <div class="single-home">
                            <i class="la la-home"> </i><a href="{{ route('home') }}"> HOME </a>
                        </div>
                        <div class="single-cats">
                            <i class="la la-bars"></i> <a
                                href="{{ url('/news/category/' . $news->category->id . '/' . $news->category->slug . '') }}"
                                rel="category tag">
                                {{ translateThis($news->category->name) }}
                            </a>
                            @if ($news->subCategory)
                                --> <a
                                    href="{{ url('/news/subcategory/' . $news->subCategory->id . '/' . $news->subCategory->slug . '') }}"
                                    rel="category tag">
                                    {{ translateThis($news->subCategory->name) }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <h1 class="single-page-title">{{ translateThis($news->title) }}</h1>
                    <div class="row g-2">
                        <div class="col-lg-1 col-md-2 ">
                            <div class="reportar-image">
                                <img src="{{ $news->user->getImg() }}">
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-10">
                            <div class="reportar-title"><a
                                    href="{{ route('search_by_reporter', $news->user_id) }}">{{ $news->user->fname }}
                                    {{ $news->user->lname }}</a></div>
                            <div class="viwe-count">
                                <ul>
                                    <li><i class="la la-clock-o"></i>Posted {{ $news->created_at->format('l d M Y') }}
                                    </li>
                                    <li> <i class="la la-eye"></i> {{ $news->views }} Views</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="single-image">
                        <a href=" "><img class="lazyload" src="{{ $news->getImg() }}"></a>
                        <h2 class="single-caption2"> {{ translateThis($news->title) }}</h2>
                    </div>

                    <div class="single-page-add2">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                        src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                            </div>
                        </div>
                    </div>
                    <button id="inc" class="btn btn-info waves-effect waves-light">A+</button>
                    <button id="dec" class="btn btn-info waves-effect waves-light">A-</button>
                    <news-font>
                        <div class="single-details" id="detailsText">{!! translateThis($news->details) !!}</div>
                    </news-font>
                    <div class="singlePage2-tag">
                        <span> Tags : </span>
                        @foreach (explode(',', $news->tags) as $tags)
                            <a href=" " rel="tag">{{ ucwords($tags) }} </a>
                        @endforeach
                    </div>

                    <div class="single-add">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                        src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                            </div>
                        </div>
                    </div>

                    <h3 class="single-social-title">
                        Share News </h3>
                    <div class="single-page-social">
                        <a href=" " target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a><a
                            href=" " target="_blank"><i class="lab la-twitter"></i></a><a href=" "
                            target="_blank"><i class="lab la-linkedin-in"></i></a><a href=" " target="_blank"><i
                                class="lab la-digg"></i></a><a href=" " target="_blank"><i
                                class="lab la-pinterest-p"></i></a><a onclick="printFunction()" target="_blank"><i
                                class="las la-print"></i>
                            <script>
                                function printFunction() {
                                    window.print();
                                }
                            </script>
                        </a>
                    </div>

                    @if (count($news->comments) != 0)
                        <div class="author2">
                            <div class="author-content2">
                                <h6 class="author-caption2">
                                    <span> COMMENTS </span>
                                </h6>

                                @foreach ($news->comments as $comment)
                                    <div class="p-2 overflow-hidden">
                                        <div class="author-image2">
                                            <img alt="" src="{{ $comment->user->getImg() }}"
                                                class="avatar avatar-96 photo" height="75px" width="75px" loading="lazy">
                                        </div>
                                        <div class="authorContent">
                                            <h1 class="author-name2">
                                                <a href="#"> {{ $comment->user->fname }} {{ $comment->user->lname }}
                                                </a>
                                            </h1>
                                            <p class="float-end">{{ $comment->created_at->diffForHumans() }} </p>
                                            <div class="author-details">{{ $comment->text }} </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif


                    <hr>

                    @auth
                        <form action="{{ route('comment') }}" method="post" class="wpcf7-form init"
                            enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="main_section">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-title">Comments</div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap news_details">
                                                <textarea name="comment" cols="20" rows="5"
                                                    class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"
                                                    placeholder="Post Comment...."></textarea>
                                                @error('comment')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-btn">
                                        <input type="submit" value="Submit Comments"
                                            class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                            class="wpcf7-spinner"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}"> Login </a> to make a comment</p>
                    @endauth



                    <div class="single_relatedCat">
                        <a href=" ">Related News </a>
                    </div>
                    <div class="row">
                        @foreach ($relatedNews as $news)
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="related-wrpp">
                                    <div class="related-image">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                class="lazyload" src="{{ $news->getImg() }}"></a>
                                    </div>
                                    <h4 class="related-title">
                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">{{ str($news->title)->limit(40) }}
                                        </a>
                                    </h4>
                                    <div class="related-meta">
                                        <a href=" "><i class="la la-tags">
                                            </i>{{ $news->created_at->format('d M Y') }} </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                @include('frontend.news.latestAndPopular')
            </div>
        </div>
        </div>
    </section>
    <script>
        let fSize = 16;

        function setFontSize(size) {
            $('news-font').css('font-size', size + 'px');
            fSize = size;
        }

        $('#inc').click(function() {
            if (fSize < 50) {
                setFontSize(fSize + 5);
            }
        });
        $('#dec').click(function() {
            if (fSize > 18) {
                setFontSize(fSize - 5);
            }
        });
        setFontSize(fSize);
    </script>
@endsection

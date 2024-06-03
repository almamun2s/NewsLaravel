@extends('frontend.body.main_layout')

@section('title', "News by $user->fname $user->lname")

@section('content')



    <section class="author-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="row">

                        @forelse ($user->news as $news)
                            <div class="custom-col-6">
                                <div class="author-wrpp">
                                    <div class="authorNews-image">

                                        <a
                                            href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}"><img
                                                class="lazyload" src="{{ $news->getImg() }}"></a>
                                    </div>
                                    <div class="authorPage-content">
                                        <h2 class="authorPage-title">
                                            <a
                                                href="{{ route('news_details', ['id' => $news->id, 'slug' => $news->title_slug]) }}">
                                                {{ str($news->title)->limit(40) }} </a>
                                        </h2>
                                        <div class="author-date">
                                            <span> <i class="las la-clock"></i> {{ $news->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="custom-col-6">
                                <h3> No posts found</h3>
                            </div>
                        @endforelse

                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="post-nav">
                                <ul class="pager">
                                    <li class="previous"><a href=" "><i class="las la-step-backward"></i>
                                        </a></li>
                                    <li><a href=" " title="previous"><i class="la la-backward"
                                                aria-hidden="true"></i>
                                        </a></li>
                                    <li><a href=" ">01</a></li>
                                    <li class="active"><span class="active">02</span></li>
                                    <li><a href=" ">03</a></li>
                                    <li><a href=" ">04</a></li>
                                    <li><a href=" " title="next"><i class="la la-forward"
                                                aria-hidden="true"></i>
                                        </a></li>
                                    <li class="next"><a href=" "><i class="las la-step-forward"></i>
                                        </a></li>
                                </ul>
                            </div>
                        </div>

                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="fixd-sitebar" style="position: sticky; top: 0;">
                        <div class="authorPage-content"
                            style="background:#fbf7f7; border: 2px solid #e1dfdf; border-radius: 5px;">
                            <figure class="authorPage-image">
                                <img alt="" src="{{ $user->getImg() }}" class="avatar avatar-96 photo"
                                    height="96" width="96" loading="lazy">
                            </figure>
                            <h1 class="authorPage-name">
                                <a href=" "> {{ $user->fname }} {{ $user->lname }} </a>
                            </h1>
                            {{-- <div class="author-social">
                                <a href="https://www.facebook.com//" target="_blank" title="Facebook"><i
                                        class="lab la-facebook-f"></i></a>
                                <a href="https://www.twitter.com//" target="_blank" title="Twitter"><i
                                        class="lab la-twitter"></i></a>
                                <a href="https://www.youtube.com//" target="_blank" title="Youtube"><i
                                        class="lab la-youtube"></i></a>
                                <a href="https://www.linkedin.com//" target="_blank" title="Linkedin"><i
                                        class="lab la-linkedin-in"></i></a>
                                <a href="https://www.instagram.com//" target="_blank" title="Instagram"><i
                                        class="lab la-instagram"></i></a>
                            </div>
                            <div class="author-details" style="text-align:justify">
                                Earlier, on Sunday morning, Prime Minister Sheikh Hasina along with her younger sister
                                Sheikh Rehana went to the Palace of Westminster to pay their last respect to the late Queen
                                where the body of Elizabeth II was kept in the Lying-in-State. </div> --}}
                        </div>

                        <div class="authorPopular_item">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@php
    $breakingNews = App\Models\NewsPost::where('status', 'publish')->where('breaking_news', 1)->latest()->limit(5)->get();
@endphp
<div class="top-scroll-section5">
    <div class="container">
        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span> {{ GoogleTranslate::trans(  'Breaking News ::' , app()->getLocale()) }} </span>
                            </div>
                        </div>
                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()"
                                onmouseout="this.start()">
                                @foreach ($breakingNews as $news)
                                    <a href=" ">
                                        <img src="{{ $news->getImg() }}" alt="Logo" title="Logo" width="30px"
                                            height="auto"> {{ GoogleTranslate::trans($news->title, app()->getLocale()) }} </a>
                                @endforeach
                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-bs-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

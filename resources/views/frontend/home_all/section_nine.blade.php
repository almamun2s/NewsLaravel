<section class="section-ten">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-camera"></i> PHOTO
                        GALLERY </a></h2>

                <div class="homeGallery owl-carousel owl-loaded owl-drag">







                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">

                            @php
                                $photos = App\Models\PhotoGallery::latest()->get();
                            @endphp
                            @foreach ($photos as $photo)
                                <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="photo">
                                            <a class="themeGallery" href="{{ $photo->getImg() }}">
                                                <img src="{{ $photo->getImg() }}" alt="PHOTO"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                class="las la-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
                <div class="homeGallery1 owl-carousel owl-loaded owl-drag">







                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">


                            @foreach ($photos as $photo)
                                <div class="owl-item cloned" style="width: 122.333px; margin-right: 10px;">
                                    <div class="item">
                                        <div class="phtot2">
                                            <a class="themeGallery" href="{{ $photo->getImg() }}">
                                                <img src="{{ $photo->getImg() }}" alt="PHOTO"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> VIDEO
                        GALLERY </a></h2>

                <div class="white-bg">
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <img src="assets/images/lazy.jpg">
                            <a href="https://www.youtube.com/watch?v=z3ZM1TUNoUY" class="home-video-icon popup"><i
                                    class="las la-video"></i></a>
                            <h5 class="secFive_title2">
                                <a href="https://www.youtube.com/watch?v=z3ZM1TUNoUY" class="popup">
                                    Pakistan set up Asia Cup final </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <img src="assets/images/lazy.jpg">
                            <a href="https://www.youtube.com/watch?v=XTUg53YVaqQ" class="home-video-icon popup"><i
                                    class="las la-video"></i></a>
                            <h5 class="secFive_title2">
                                <a href="https://www.youtube.com/watch?v=XTUg53YVaqQ" class="popup">
                                    Pakistan set up Asia Cup final</a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <img src="assets/images/lazy.jpg">
                            <a href="https://www.youtube.com/watch?v=qr3CeJJ_mkM" class="home-video-icon popup"><i
                                    class="las la-video"></i></a>
                            <h5 class="secFive_title2">
                                <a href="https://www.youtube.com/watch?v=qr3CeJJ_mkM" class="popup">
                                    Pakistan set up Asia Cup final </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <img src="assets/images/lazy.jpg">
                            <a href="https://www.youtube.com/watch?v=BU12aHPjoNo" class="home-video-icon popup"><i
                                    class="las la-video"></i></a>
                            <h5 class="secFive_title2">
                                <a href="https://www.youtube.com/watch?v=BU12aHPjoNo" class="popup">
                                    Pakistan set up Asia Cup final </a>
                            </h5>
                        </div>
                    </div>
                    <div class="secFive-smallItem">
                        <div class="secFive-smallImg">
                            <img src="assets/images/lazy.jpg">
                            <a href="https://www.youtube.com/watch?v=TH0kuBADgSI" class="home-video-icon popup"><i
                                    class="las la-video"></i></a>
                            <h5 class="secFive_title2">
                                <a href="https://www.youtube.com/watch?v=TH0kuBADgSI" class="popup">
                                    Pakistan set up Asia Cup final </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

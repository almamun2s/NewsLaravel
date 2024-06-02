<header class="themesbazar_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="date">
                            <i class="lar la-calendar"></i>
                            @php
                                $cDate = new DateTime();
                            @endphp
                            {{ $cDate->format('l d-m-Y') }}
                        </div>
                    </div>
                    @if (translatable())
                        <div class="col-md-6">
                            <select class="form-select changelang">
                                <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>
                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option>
                                <option value="tr" {{ session()->get('locale') == 'tr' ? 'selected' : '' }}>Turkish</option>
                            </select>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <form class="header-search" action="{{ route('search') }}" method="post">
                    @csrf
                    <input type="text" name="search" placeholder=" Search Here " required autocomplete="off" value="{{ old('search')}}" >
                    <button type="submit" value="Search"> <i class="las la-search"></i> </button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header-social">
                    <ul>
                        <li> <a href="https://www.facebook.com/" target="_blank" title="facebook"><i
                                    class="lab la-facebook-f"></i> </a> </li>
                        <li><a href="https://twitter.com/" target="_blank" title="twitter"><i class="lab la-twitter">
                                </i> </a></li>
                        @guest
                            <li><a href="{{ route('login') }}"><b> Login </b></a> </li>
                            <li> <a href="{{ route('register') }}"> <b>Register</b> </a> </li>
                        @endguest
                        @auth
                            <li> <a href="{{ route('logout') }}"> <b>Logout</b> </a> </li>
                            <li> <a href="{{ route('dashboard') }}"> <b>Dashboard</b> </a> </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{ route('home') }}" title="NewsFlash">
                            <img src="{{ asset('/frontend/assets/images/logo.png') }}" alt="NewsFlash"
                                title="NewsFlash">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                        <a href=" " target="_blank">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</header>

<script>
    $(document).ready(function() {
        let url = "{{ route('changlang') }}";
        $('.changelang').change(function() {
            window.location.href = url + '?lang=' + $(this).val();
        });
    });
</script>

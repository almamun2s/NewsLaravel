<header class="themesbazar_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="date">
                    <i class="lar la-calendar"></i>
                    Dhaka, Saturday, 10th September 2022
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <form class="header-search" action=" " method="post">
                    <input type="text" alue="" name="s" placeholder=" Search Here " required="">
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
                        <a href=" " title="NewsFlash">
                            <img src="assets/images/logo.png" alt="NewsFlash" title="NewsFlash">
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

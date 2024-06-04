<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ auth()->user()->getImg() }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block">{{ auth()->user()->fname }}
                {{ auth()->user()->lname }} </div>
            <p class="text-muted" style="text-transform: capitalize;">{{ auth()->user()->role }} </p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                @if (auth()->user()->status == 'active')
                    <li>
                        <a href="{{ route('admin.banner') }}">
                            <i class="fa-solid fa-image"></i>
                            <span>Banner</span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Menu</li>

                    <li>
                        <a href="#sidebarCategory" data-bs-toggle="collapse">
                            <i class="mdi mdi-shape-outline"></i>
                            <span class="material-icons-outlined">Category</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCategory">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.category') }}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.sub_category') }}">SubCategories</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#newsPost" data-bs-toggle="collapse">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="material-icons-outlined">News Post</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="newsPost">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/news_post') }}">News Posts</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/news_post/create') }}">Add News Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.news.comments') }}">Comments</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#gallery" data-bs-toggle="collapse">
                            <i class="fa-solid fa-photo-film"></i>
                            <span class="material-icons-outlined">Gallery</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="gallery">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ url('admin/photo_gallery') }}">Photo Gallery</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/video_gallery') }}">Video Gallery</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.livetv') }}">Live TV</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="menu-title mt-2">Settings</li>

                    <li>
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i class="mdi mdi-account-circle-outline"></i>
                            <span> Admins </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAuth">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.manage') }}">Manage Admins</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.user_manage') }}">Manage Users</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#rolesAndPermissions" data-bs-toggle="collapse">
                            <i class="fa-solid fa-key"></i>
                            <span>Role and Permission</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="rolesAndPermissions">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/permissions') }}">Permissions</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/roles') }}">Roles</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('admin.web_meta_data') }}">
                            <i class="fa-solid fa-database"></i>
                            <span>Website Meta Data</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('admin.web_settings') }}">
                        <i class="fa-solid fa-gear"></i>
                        <span>Website Settings</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

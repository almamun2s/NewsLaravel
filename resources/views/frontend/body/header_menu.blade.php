@php
    $categories = App\Models\Category::orderBy('name', 'ASC')->limit(5)->get();
@endphp
<div class="menu_section sticky" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href=" " title="NewsFlash">
                        <img src="assets/images/footer_logo.gif" alt="Logo" title="Logo">
                    </a>
                </div>
                <div class="stellarnav dark desktop"><a href="{{ url('/') }}" class="menu-toggle full"><span
                            class="bars"><span></span><span></span><span></span></span>
                    </a>
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-89"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-89">
                            <a href="{{ url('/') }}" aria-current="page"> <i class="fa-solid fa-house-user"></i>
                                Home</a>
                        </li>
                        @foreach ($categories as $category)
                            <li id="menu-item-291"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291 has-sub">
                                <a
                                    href="{{ url("/news/category/$category->id/$category->slug") }}">{{ $category->name }}</a>
                                @if ($category->subCategories)
                                    <ul class="sub-menu">
                                        @foreach ($category->subCategories as $subCategory)
                                            <li id="menu-item-294"
                                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-294">
                                                <a href="{{ url("/news/subcategory/$subCategory->id/$subCategory->slug") }}">{{ $subCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

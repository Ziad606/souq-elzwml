<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +02103578106</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>
                    <form>
                        <select name="lang" class="form-select form-select-sm custom-select" onchange="window.location.href=this.value;">
                            <option value="{{ route('lang', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>En</option>
                            <option value="{{ route('lang', 'ar') }}" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>Ar</option>
                        </select>
                    </form>
                </li>
                <li><a href="#"><i class="fa fa-user-o"></i>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" style="color:red" href="#">
                            {{ __('Account') }}
                        </a>
                        <a class="dropdown-item" style="color:red" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                </a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">{{ __('All Categories') }}</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input class="input" placeholder="{{ __('Search here') }}">
                            <button class="search-btn">{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>{{ __('Your Wishlist') }}</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{ __('Your Cart') }}</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a
                                                    href="#">{{ __('product name goes here') }}</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a
                                                    href="#">{{ __('product name goes here') }}</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 {{ __('Item(s) selected') }}</small>
                                    <h5>{{ __('SUBTOTAL') }}: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">{{ __('View Cart') }}</a>
                                    <a href="#">{{ __('Checkout') }} <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>{{ __('Menu') }}</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>

<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav h-font">
                <li class="active"><a href="{{route('home')}}">{{ __('Home Page') }}</a></li>
                <li><a href="#">{{ __('Hot Deals') }}</a></li>
                <li><a href="{{route('categories.create')}}">{{ __('Categories') }}</a></li>
                <li><a href="{{route('products.create')}}">{{ __('Products') }}</a></li>
                <li><a href="#">{{ __('Laptops') }}</a></li>
                <li><a href="#">{{ __('Smartphones') }}</a></li>
                <li><a href="#">{{ __('Cameras') }}</a></li>
                <li><a href="#">{{ __('Accessories') }}</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>

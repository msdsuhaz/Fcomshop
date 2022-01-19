<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    <font size="3px" color="#fff">
                        {{$contact->mobile}} &nbsp;&nbsp;&nbsp;
                        {{$contact->email}}
                    </font>
                </div>

                <div class="right-top-bar flex-w h-full">
                    <ul class="social">
                        <li class="facebook" ><a href="{{$contact->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="{{$contact->twtter}}"target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="youtube"><a href="{{$contact->youtube}}"target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="{{asset('/')}}" class="logo">
                    <img src="{{asset('/upload/logo_image/'.$logo->image)}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{asset('/')}}">HOME</a>
                        </li>
                        <li class="active-menu">
                            <a href="#">SHOPS</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('product.list')}}">Products</a></li>
                                 @if(@Auth::user()->id !=NULL &&  Session::get('shipping_id')==NULL)
                                    <a href="{{route('checkout.auth')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                                 @elseif(@Auth::user()->id != Null && Session::get('shipping_id')!=NULL)
                                    <a href="{{route('customer.payment')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                                @else
						     	     <a href="{{route('castomer.login')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
						     	@endif
                                <li><a href="shoping-cart.html">Cart</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">ABOUT US</a>
                        </li>
                        <li>
                            <a href="contact.html">CONTACT US</a>
                        </li>
                        @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=="customer")
                            <li class="active-menu">
                                <a href="#">ACCOUNT</a>
                                <ul class="sub-menu">
                                    <li><a href="">MY PROFILE</a></li>
                                    <li><a href="">PASSWORD CHANGE</a></li>
                                    <li><a href="">MY ORDER</a></li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                              LOGOUT
                                        </a>
                          
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{route('castomer.login')}}">LOGIN</a></li>
                        @endif
                      
                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="index.html"><img src="{{asset('/upload/logo_image/'.$logo->image)}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::count()}}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    <font size="3px" color="#fff">
                        {{$contact->mobile}} &nbsp;&nbsp;&nbsp;
                        {{$contact->email}}
                    </font>
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <ul class="social">
                        <li class="facebook" ><a href="{{$contact->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="{{$contact->twtter}}"target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li class="youtube"><a href="{{$contact->youtube}}"target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li><a href="{{asset('/')}}">Home</a></li>
            <li>
                <a href="">SHOPS</a>
                <ul class="sub-menu-m">
                    <li><a href="{{route('product.list')}}">Products</a></li>
                    @if(@Auth::user()->id !=NULL &&  Session::get('shipping_id')==NULL)
                     <a href="{{route('checkout.auth')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                    @elseif(@Auth::user()->id != Null && Session::get('shipping_id')!=NULL)
                    <a href="{{route('customer.payment')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                     @else
                     <a href="{{route('castomer.login')}}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                    @endif
                    <li><a href="shoping-cart.html">Cart</a></li>
                </ul>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li>
                <a href="">ABOUT US</a>
            </li>
            <li>
                <a href="contact.html">CONTACT US</a>
            </li>
            @if(@Auth::user()->id !=NULL && @Auth::user()->usertype=="customer")
            <li class="active-menu">
                <a href="#">ACCOUNT</a>
                <ul class="sub-menu">
                    <li><a href="">MY PROFILE</a></li>
                    <li><a href="">PASSWORD CHANGE</a></li>
                    <li><a href="">MY ORDER</a></li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                              LOGOUT
                        </a>
          
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                        </li>
                        </ul>
             </li>
             @else
              <li><a href="{{route('castomer.login')}}">LOGIN</a></li>
             @endif
          </ul>
       </div>
</header>

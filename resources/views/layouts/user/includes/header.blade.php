<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        @auth
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}<i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <li><a> Logout</a></li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @else
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Login / Register<i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('signIn') }}">Login</a></li>
                                <li><a href="{{ route('signup') }}">Register</a></li>
                            </ul>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="/"><img src="{{ asset('images/logo.png') }}"
                            alt=""></a></div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item menu-item-has-children has-mega-menu"><a href="{{route('user-product-listing.index')}}">Categories</a>
                        <div class="mega-menu">
                            <div class="mega-wrap">
                                <div class="mega-column">
                                    <ul class="mega-item mega-features">
                                        @foreach ($categoriesParent as $item)
                                        <li><a href="{{url("user-product-listing?category_id=$item->id")}}">{{ $item->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @foreach ($categoriesParent as $item)
                                <div class="mega-column">
                                    <h4 class="mega-heading">{{ $item->name }}</h4>
                                    @foreach ($item->children as $item)
                                    <ul class="mega-item">
                                        <li><a href="{{url("user-product-listing?category_id=$item->id")}}">{{ $item->name }}</a></li>
                                    </ul>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @auth
                    <li class="menu-item"><a href="{{ route('user-wishlist.index') }}">Wishlist</a></li>
                    <li class="menu-item"><a href="{{ route('user-transaction.index') }}">Transaction</a></li>
                    @endauth
                    <li class="menu-item menu-item-has-children dropdown"><a href="#footer">Contact</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="#footer">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @auth
            <div class="navigation__column right">
                <form class="ps-search--header" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Search Product…">
                    <button><i class="ps-icon-search"></i></button>
                </form>
                <div class="ps-cart"><a class="ps-cart__toggle"
                        href="{{route('user-cart.index')}}"><span><i id="qtySpan">{{Auth::user()->carts()->sum('quantity')}}</i></span><i
                            class="ps-icon-shopping-cart"></i></a>
                    @if (Auth::user()->carts()->count())

                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            @foreach ($carts as $item)
                            <div class="ps-cart-item"><a class="ps-cart-item__close"
                                    onclick="deleteDataCart({{$item->id}})"></a>
                                <div class="ps-cart-item__thumbnail"><a href=" "></a><img
                                        src="{{ asset('images/cart-preview/1.jpg') }}" alt=""></div>
                                <div class="ps-cart-item__content"><a class="ps-cart-item__title"
                                        href="{{ route('user-product.show', $item->product->id) }}">{{ $item->product->name }}</a>
                                    <p><span>Quantity:<i id="qty_p_{{$item->id}}">{{ $item->quantity }}</i></span><span>Total:<i class="total_{{$item->id}}">{{ $item->total }}</i></span>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="ps-cart__total">
                            <p>Number of items:<span id="qtyNumberOfItems">{{ Auth::user()->carts->sum('quantity') }}</span></p>
                            <p>Item Total:<span class="cart_total">{{ Auth::user()->carts->sum('total') }}</span></p>
                        </div>
                        <div class="ps-cart__footer"><a class="ps-btn" href="{{route('user-checkout.index')}}">Check out<i
                                    class="ps-icon-arrow-left"></i></a></div>
                    </div>
                    @else
                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            <div class="ps-cart-item">
                                <div class="ps-cart-item__content">
                                    <p class="ps-cart-item__title">No Cart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="menu-toggle"><span></span></div>
            </div>
            @endauth
        </div>
    </nav>
</header>

@push('scripts')
<script type="text/javascript">
    function deleteDataCart(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "user-cart/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    //refresh
                    location.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush

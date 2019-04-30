@extends('layouts.user.master')
@section('content')
<div class="ps-products-wrap pt-80 pb-80">
    <div class="ps-products" data-mh="product-listing">
        @if(count($products))
        <div class="ps-product-action">
            <div class="ps-product__filter">
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Name</option>
                    <option value="3">Price (Low to High)</option>
                    <option value="3">Price (High to Low)</option>
                </select>
            </div>
            {{-- <div class="ps-pagination">
              <ul class="pagination">
                  <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
          </div> --}}
        </div>
        <div class="ps-product__columns">
            {{-- product --}}
            @foreach ($products as $item)
            <div class="ps-product__column">
                <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                        {{-- <div class="ps-badge"><span>New</span></div>
                  <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div> --}}
                        @auth
                        @if (!$user->wishlists->contains('product_id', $item->id))
                        <a class="ps-shoe__favorite" onclick="wishlist({{$item->id}}, {{$item->price}} )"><i
                                class="ps-icon-heart"></i></a>
                        @endif
                        @endauth
                        <img src="{{ asset('storage/files/'.$item->image) }}" alt="">
                        <a class="ps-shoe__overlay" href="{{route('user-product.show', $item->id)}}"></a>
                    </div>
                    <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                            <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img
                                    src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img
                                    src="images/shoe/5.jpg" alt=""></div>
                            <select class="ps-rating ps-shoe__rating" disabled>
                                @for ($i = 1; $i <= $item->rating; $i++)
                                    <option value="1">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                href="{{route('user-product.show', $item->id)}}">{{ $item->name }}</a>
                            <p class="ps-shoe__categories"><a href="{{url("user-product-listing?category_id=$item->category_id")}}">{{ $item->category->name }}</a></p>
                            <span class="ps-shoe__price">{{ $item->priceWithCurrency() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- product --}}
        </div>
        <div class="ps-product-action">
            <div class="ps-product__filter">
                <select class="ps-select selectpicker">
                    <option value="1">Shortby</option>
                    <option value="2">Name</option>
                    <option value="3">Price (Low to High)</option>
                    <option value="3">Price (High to Low)</option>
                </select>
            </div>
            {{-- <div class="ps-pagination">
              <ul class="pagination">
                  <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
          </div> --}}
        </div>
        @else
        <p>no data</p>
        @endif
    </div>
    <div class="ps-sidebar" data-mh="product-listing">
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="list-group">
                    @foreach ($categoriesParent as $item)
                    {{-- <li class="current"><a href="product-listing.html">{{$item->name}}</a></li> --}}
                    {{-- <li><a onclick="sortByCategory({{$item->id}})">{{$item->name}}</a></li> --}}
                    <li class="list-group-item"><a href="{{url("user-product-listing?category_id=$item->id")}}">{{$item->name}}</a></li>

                    {{-- url('user-product-listing')}}?category_id=" --}}
                    @endforeach
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
                <h3>Range</h3>
            </div>
            <div class="ps-widget__content">
            <div class="ac-slider" data-default-min="{{ $products->min('price') }}" data-default-max="{{ $products->max('price') }}" data-max="{{ $products->max('price')+100 }}" data-step="50"
                    data-unit="$"></div>
                <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span
                        class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn"
                    href="#">Filter</a>
            </div>
        </aside>
        {{-- <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Sky Brand</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                <li><a href="product-listing.html">Adidas(76)</a></li>
                <li><a href="product-listing.html">Baseball(69)</a></li>
                <li><a href="product-listing.html">Gucci(36)</a></li>
                <li><a href="product-listing.html">Dior(108)</a></li>
                <li><a href="product-listing.html">B&G(108)</a></li>
                <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
              </ul>
            </div>
          </aside> --}}
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Size</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked">
                    <li class="current"><a href="product-listing.html">S</a></li>
                    <li><a href="product-listing.html">M</a></li>
                    <li><a href="product-listing.html">XL</a></li>
                </ul>
            </div>
        </aside>
        <div class="ps-sticky desktop">
            {{-- <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Size</h3>
              </div>
              <div class="ps-widget__content">
                <table class="table ps-table--size">
                  <tbody>
                    <tr>
                      <td class="active">3</td>
                      <td>5.5</td>
                      <td>8</td>
                      <td>10.5</td>
                      <td>13</td>
                    </tr>
                    <tr>
                      <td>3.5</td>
                      <td>6</td>
                      <td>8.5</td>
                      <td>11</td>
                      <td>13.5</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>6.5</td>
                      <td>9</td>
                      <td>11.5</td>
                      <td>14</td>
                    </tr>
                    <tr>
                      <td>4.5</td>
                      <td>7</td>
                      <td>9.5</td>
                      <td>12</td>
                      <td>14.5</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>7.5</td>
                      <td>10</td>
                      <td>12.5</td>
                      <td>15</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </aside> --}}
            {{-- <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Color</h3>
              </div>
              <div class="ps-widget__content">
                <ul class="ps-list--color">
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>
            </aside> --}}
        </div>
        <!--aside.ps-widget--sidebar-->
        <!--    .ps-widget__header: h3 Ads Banner-->
        <!--    .ps-widget__content-->
        <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
        <!---->
        <!--aside.ps-widget--sidebar-->
        <!--    .ps-widget__header: h3 Best Seller-->
        <!--    .ps-widget__content-->
        <!--        - for (var i = 0; i < 3; i ++)-->
        <!--            .ps-shoe--sidebar-->
        <!--                .ps-shoe__thumbnail-->
        <!--                    a(href='#')-->
        <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
        <!--                .ps-shoe__content-->
        <!--                    if i == 1-->
        <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
        <!--                    else if i == 2-->
        <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
        <!--                    else-->
        <!--                        a(href='#').ps-shoe__title Men's Sky-->
        <!--                    p <del> £253.00</del> £152.00-->
        <!--                    a(href='#').ps-btn PURCHASE-->
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    // $(document).ready(function () {
    //     $('#province_id').click(function () {
    //         var provinceID = $(this).val();
    //         if (provinceID) {
    //             $.ajax({
    //                 type: "GET",
    //                 url: "{{url('user-get-city')}}?province_id=" + provinceID,
    //                 success: function (res) {
    //                     if (res) {
    //                         $("#city_id").find('option').remove();
    //                         $.each(res, function (key, value) {
    //                             $('#city_id').append("<option value='" + value
    //                                 .city_id + "'>" + value.city_name +
    //                                 "</option>");
    //                         });
    //                     } else {
    //                         $(".city_id").empty();
    //                     }
    //                 }
    //             });
    //         } else {
    //             $("#city").empty();
    //         }
    //     });

    // function sortByCategory(category_id) {
    //     $.ajax({
    //         type: "GET",
    //         url: "{{url('user-product-listing')}}?category_id=" + category_id,
    //         success: function (data) {
    //             //refresh
    //             location.reload();
    //         },
    //         error: function () {
    //             alert("Error!");
    //         }
    //     });
    // }
    // });

</script>
@endpush

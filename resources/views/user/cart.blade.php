@extends('layouts.user.master')
@section('content')
<div class="ps-content pt-80 pb-80">
    <div class="ps-container">
        <div class="ps-cart-listing">
            <table class="table ps-cart__table">
                <thead>
                    <tr>
                        <th>All Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $item)
                    <tr>
                        <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15"
                                    src="images/product/cart-preview/1.jpg" alt=""> {{$item->product->name}}</a></td>
                        <td id="price">{{$item->product->price}}</td>
                        <td>
                            <div class="form-group--number">
                                <form method="POST">
                                    @csrf
                                    @method('patch')
                                    {{-- <input type="hidden" id="cart_id" value="{{$item->id}}"> --}}
                                    <button class="minus" data-route="{{ url('user-cart') }}" data-increase="0"
                                        data-id="{{ $item->id }}"><span>-</span></button>
                                    <input class="form-control cart_quantity_input_{{ $item->id }}" type="text"
                                        value="{{$item->quantity}}">
                                    <button class="plus" data-route="{{ url('user-cart') }}" data-increase="1"
                                        data-id="{{ $item->id }}"><span>+</span></button>
                                </form>
                            </div>
                        </td>
                        {{-- <td>{{$item->product->price * $item->quantity}}</td> --}}
                        <td class="total_{{ $item->id }}">{{$item->total}}</td>
                        <td>
                            <div class="ps-remove" onclick="deleteDataCart({{$item->id}})"></div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="ps-cart__actions">
                {{-- <div class="ps-cart__promotion">
                    <div class="form-group">
                        <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                            <input class="form-control" type="text" placeholder="Promo Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                    </div>
                </div> --}}
                <div class="ps-cart__total">
                    <h3>Total Price: <span class="cart_total"> {{$carts->sum('total')}}</span></h3><a class="ps-btn"
                        href="{{route('user-checkout.index', compact('carts'))}}">Process to
                        checkout<i class="ps-icon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.plus, .minus').on('click', function (e) {
        e.preventDefault();
        var $this = $(this),
            url = $this.data('route'),
            id = $this.data('id'),
            increase = $this.data('increase');
        updateQty(url, id, increase);
    });

    function updateQty(url, id, increase) {
        var qty = $('.cart_quantity_input_' + id),
            qtySpan = $('#qtySpan'),
            qtyNumberOfItems = $('#qtyNumberOfItems'),
            qtyP = $('#qty_p_'+id),
            total = $('.total_' + id),
            cartTotal = $('.cart_total'),
            price = $('#price');
        $.ajax({
            url: url + "/" + id,
            type: 'POST',
            data: {
                'price': price.text(),
                'quantity': qty.val(),
                'increase': increase,
                '_token': $('meta[name=csrf-token]').attr('content'),
                '_method': 'patch'
            },
            success: function (data) {
                qty.val(data.quantity);
                total.text(data.total);
                cartTotal.text(data.cart_total);
                qtyP.text(data.quantity);
                qtySpan.text(data.sum);
                qtyNumberOfItems.text(data.sum);
            }
        });
    }

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

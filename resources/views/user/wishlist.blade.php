@extends('layouts.user.master')
@section('content')
<div class="ps-content pt-80 pb-80">
    <div class="ps-container">
        <div class="ps-cart-listing ps-table--whishlist">
            <table class="table ps-cart__table">
                <thead>
                    <tr>
                        <th>All Products</th>
                        <th>Price</th>
                        <th>View</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists as $item)
                    <tr>
                        <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15"
                                    src="images/product/cart-preview/1.jpg" alt=""> {{ $item->product->name }}</a></td>
                        <td>{{ $item->product->priceWithCurrency() }}</td>
                        <td><a class="ps-product-link" href="{{ route('user-product.show', $item->product->id) }}">View Product</a></td>
                        <td>
                            <div class="ps-remove" onclick="deleteDataWishlist({{ $item->id }})"></div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function deleteDataWishlist(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "user-wishlist/" + id,
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
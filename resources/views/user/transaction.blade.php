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
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail"><img class="mr-15" src="images/product/cart-preview/1.jpg" alt=""> air jordan One mid</a></td>
                  <td>$150</td>
                  <td>2 Pcs</td>
                  <td>$300</td>
                  <td>
                    <div class="">Verifed</div>
                  </td>
                </tr>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail"><img class="mr-15" src="images/product/cart-preview/2.jpg" alt=""> The Crusty Croissant</a></td>
                  <td>$150</td>
                  <td>2 Pcs</td>
                  <td>$300</td>
                  <td>
                    <div class="">Verifed</div>
                  </td>
                </tr>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail"><img class="mr-15" src="images/product/cart-preview/3.jpg" alt="">The Rolling Pin</a></td>
                  <td>$150</td>
                  <td>2 Pcs</td>
                  </td>
                  <td>$300</td>
                  <td>
                    <div class="">Verifed</div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__promotion">
                <div class="form-group">
                  <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

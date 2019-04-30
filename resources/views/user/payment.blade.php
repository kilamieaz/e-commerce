@extends('layouts.user.master')
@section('content')<div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-container">
                <div class="ps-cart-listing">
                    <fieldset class="fieldset-success" style="	background: white;
                    border: 0 none;
                    border-radius: 3px;
                    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
                    padding: 20px 30px;
                    box-sizing: border-box;
                    width: 80%;
                    margin: 0 10%;
                    position: relative;
                    text-align: center">
                        <h2 class="fs-title">Payment Successfull </h2>
                        <img src="https://img.icons8.com/cotton/64/000000/checkmark.png">


                        <h3 class="fs-subtitle">ID Transaction: {{$PayerID}} was Payed </h3>
                        <a type="button" class="ps-btn ps-btn--gray" style="margin-top: 20px;" href="{{route('user-transaction.index')}}">View Receipt</a>
                      </fieldset>
            </div>
          </div>
        </div>
      </div>
@endsection

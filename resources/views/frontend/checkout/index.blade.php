@extends('layouts.frontend')
@section('title')
    Checkout
@endsection
@section('content')
    <section class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-2">
                    <h5><a href="/" class="text-dark">Home</a> › Checkout</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                    <form action="{{url('place-order')}}" method="POST">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
                             <label for="">First Name</label>
                             <input type="text" name="first_name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" placeholder="First Name">
                    </div>
                </div> <!--col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->lname}}" placeholder="Last Name">
                    </div>
                </div><!--col-md-6 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" placeholder="Phone Number">
                    </div>
                </div><!--col-md-6 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alternate Number</label>
                                <input type="text" name="alternate_phone" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->alternate_phone}}" placeholder=" Alternate Phone Number">
                            </div>
                        </div><!--col-md-6 -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address1}}" placeholder="Address 1, Flat No">
                            </div>
                            <div class="form-group">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address2}}" placeholder="Address 2">
                            </div>
                        </div><!--col-md-12 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control"  value="{{\Illuminate\Support\Facades\Auth::user()->city}}" placeholder="City">
                            </div>
                        </div><!--col-md-4-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">State</label>
                                <input type="text" name="state" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->state}}" placeholder="State">
                            </div>
                        </div><!--col-md-4-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pin Code</label>
                                <input type="number" name="pincode" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->pincode}}" placeholder="Pin Code">
                            </div>
                        </div><!--col-md-4-->
                        <div class="col-md-6">
                            <button type="submit" name="place_order_btn" class="btn btn-primary">Place Your Order</button>
                             </div><!--col-md-6-->
                        <div class="col-md-6">
                            <button type="button" class="esewa_pay_btn btn btn-info btn-block">Esewa Pay Online</button>
                            </div>
                         </div>
                    </form>
                </div>
                    </div>
                </div>
                    <div class="col-md-5">
                        @if(isset($cart_data))
                            @if(Cookie::get('shopping_cart'))
                                @php $total="0" @endphp
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr>
                                        <td>{{ $data['item_name'] }}</td>
                                        <td>{{ number_format($data['item_price'], 2) }}</td>
                                        <td>{{ $data['item_quantity'] }}</td>
                                        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="text-right">
                                    <h5>Grand Total: {{ number_format($total), 0}}</h5>
                                </div>
                            @endif
                         @else
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="shadow border py-5">
                                        <h4>Your cart is currently empty.</h4>
                                        <a href="{{ url('/') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>

    @endsection
@section('script')
    <script src="{{asset('js/checkout.js')}}"></script>
    @endsection

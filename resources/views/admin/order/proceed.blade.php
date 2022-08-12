@extends('layouts.admin')
@section('content')
    <div class="modal fade" id="CompleteOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete Order</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{url('order/complete-order/'. $orders->id)}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="modal-body">
                    @if($orders->payment_status == "0")
                        <h6>
                            <input type="checkbox" name="cash_received" required> Received Payment(Cash on Delivery)
                        </h6>
                        <p>Check the box to Confirm that you received the cash form customer. Close this order</p>
                        @else
                    <h5>The payment has been done online</h5>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
            </div>
        </div><!--modal-content-->
    </div><!--modal-dailog-->
    </div>
    <div class="container-fluid mt-5">

        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-0"> Order Status</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('orders')}}" class="float-right py-1">Back</a>
                            </div>
                        </div><!-- row-->
                    </div><!--card-body-->
                </div><!--card-->
            </div><!--col-md-12-->
        </div><!--row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                        </div><!--md-6-->
                        <div class="col-md-6">
                            <span class="float-right">
                                <label class="bg-warning py-1 px-2 text-dark"> Tracking ID: &nbsp;{{$orders->tracking_no}}</label>
                            </span>
                        </div>
                    </div><!--row-->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card shadow-sm border">
                                <h6 class="card-header">Tracking Status</h6>
                                <div class="card-body">
                                    <p>
                                        @if($orders->tracking_msg == NULL)
                                            No status Updated.
                                        @else
                                        {{$orders->tracking_msg}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div><!--col-->
                        <div class="col-md-4">
                            <div class="card shadow-sm border">
                                <h6 class="card-header">Current Status</h6>
                                <div class="card-body">
                                    <p>
                                        @if($orders->order_status == "0")
                                            Order Pending
                                        @elseif($orders->order_status =="1")
                                            Order Completed
                                            @elseif($orders->order_status == "2")
                                            Order Cancelled
                                            {{$orders->cancel_reason}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm border">
                                <h6 class="card-header">Payment Status</h6>
                                <div class="card-body">
                                    <p>
                                        @if($orders->payment_status == "0")
                                            Mode:{{ $orders->payment_mode }}
                                        @elseif($orders->payment_status == "1")
                                            Mode:{{ $orders->payment_mode }}
                                        @else
                                            {{('Paid Online') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
        <div class="card mt-3">
            <div class="card-body">
                <h5>Tracking Status Update</h5>
                <hr>
                @if($orders->order_status =="1")
                    {{$orders->tracking_msg}}
                @elseif($orders->order_status == "2")
                    {{$orders->tracking_msg}}
                @else
                    <form action="{{url('order/update-tracking-status/'.$orders->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="input-group mb-3">
                            <select name="tracking_msg" class="custom-select" required id="inputGroupSelect02">
                                <option value="">--Select--</option>
                                <option value="Pending" {{$orders->tracking_msg == "Pending"?'selected':''}}>Pending</option>
                                <option value="Packed" {{$orders->tracking_msg == "Packed"?'selected':''}}>Packed</option>
                                <option value="Shipped" {{$orders->tracking_msg == "Shipped"?'selected':''}}>Shipped</option>
                                <option value="Delivered" {{$orders->tracking_msg == "Pending"?'selected':''}}>Delivered</option>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-info text-white" for="inputGroupSelect02">Update</button>
                            </div><!--input-->
                        </div><!--input-->
                    </form>
                @endif
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-md-6-->
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Cancel Order</h5>
                    <hr>
                    @if($orders->order_status =="1")
                        Order-Completed
                    @elseif($orders->order_status == "2")
                        {{$orders->cancel_reason}}
                    @else
                        <form action="{{url('order/cancel-order/'.$orders->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="input-group mb-3">
                                <select name="cancel_reason" class="custom-select" required id="inputGroupSelect02">
                                    <option value="">--Select--</option>
                                    <option value="Customer Not Available">Customer Not Available</option>
                                    <option value="Product damaged">Product damaged</option>
                                    <option value="No response">No response</option>
                                    <option value="Delayed">Delayed</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-info text-white" for="inputGroupSelect02">Cancel</button>
                                </div><!--input-->
                            </div><!--input-->
                        </form>
                    @endif
                </div>
            </div><!--card-->
        </div><!--col-md-6-->
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Complete Order</h5>
                    <hr>
                    @if($orders->order_status == "0")
                        <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#CompleteOrderModal">
                            Proceed to finish order
                        </a>
                    @elseif($orders->order_status == "1")
                        Order Completed
                    @elseif($orders->order_status == "2")
                        Order Cancelled.! So not allowed to complete this order
                    @else
                        Nothing
                    @endif
                </div>
            </div>
        </div>
@endsection

@extends('layouts.admin')
@section('content')
    <!--Heading-->
    <div class="container-fluid mt-5">
        <div class ="card mb-4 wow fadeIn">
            <div class="card-body">
                <h6 class="mb-0">
                    Orders
                </h6>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark" > 
                        <th>ID</th>
                        <th>Tracking No</th>
                        <th>C-Name</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Proceed</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{$item->users->name.''.$item->users->lname }}</td>
                                <td>{{$item->users->phone}}</td>
                                <td>
                                    @if($item->order_status =='0')
                                        Pending
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('order-view/'.$item->id)}}" class="btn btn-primary btn-sm">View</a>
                                </td>
                                <td>
                                    <a href="{{url('order-proceed/'.$item->id)}}" class="btn btn-success btn-sm">PROCEED</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

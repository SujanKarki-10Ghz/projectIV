@extends('layouts.admin')
@section('content')
    <!--Heading-->
    <div class="container-fluid mt-5">
        <div class ="card mb-4 wow fadeIn">
            <div class="card-body d-sm-flex justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <span>Collection/ Product Deleted Records</span>
                </h4>
            </div>
        </div>
    </div>
    <!--Heading-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Model Name</th>
                        <th>Image</th>
                        <th>Show/Hide</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->subcategory->name}}</td>
                                <td><img src="{{asset('uploads/products/'.$item->image)}}" width="60px" alt="Product Image"></td>
                                <td>
                                    <input type="checkbox" {{$item->status == 'true'? 'checked':''}}>
                                </td>
                                <td>
                                    <a href="{{url('re-store-products/'.$item->id)}}" class="badge btn-danger py-2 px-2">Re-store</a>
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

@extends('layouts.admin')
@section('content')
    <!--Heading-->
    <div class="container-fluid">
        <div class ="card mb-4">
            <div class="card-body">
                <h6 class="mb-0">
                    Collections/Product
                    <a href="{{url('deleted-records-products')}}" class=" badge bg-primary p-2 text-white  float-right ml-2">Deleted Records</a>
                    <a href="{{url('add-products')}}" class=" badge bg-primary p-2 text-white float-right">Add Products</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            @if(session('status'))
                <h6>{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class= "table-dark">
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
                                <input type="checkbox"{{$item->status == 1? 'checked':''}}>
                            </td>
                            <td>
                                <a href="{{url('edit-products/'.$item->id)}}" class="badge btn btn-info">Edit</a>
                                <a href="{{url('delete-products/'.$item->id)}}" class="badge btn btn-danger">Delete</a>
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

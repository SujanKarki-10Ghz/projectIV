@extends('layouts.admin')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="SubcategoryMODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('sub-category-store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category ID(Name)</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($category as $cateitem)
                                                <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Custom Url(SLUG)</label>
                                        <input type="text" name="url" class="form-control" placeholder="Enter URL">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Priority</label>
                                        <input type="number" name="priority" class="form-control" placeholder="Enter priority">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status" class="">

                                    </div>
                                </div>

                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
                </div>
            </div>
        </div>
    </div>

    <!--Heading-->
    <div class="container-fluid">
        <div class ="card mb-4">
            <div class="card-body">
                <h6 class="mb-0">
                    Collections/ Model
                    <a href="{{url('subcategory-deleted-records')}}" class=" badge bg-primary p-2 text-white float-right ml-2">Deleted Records</a>
                    <a href="#" data-toggle="modal" data-target="#SubcategoryMODAL" class=" badge bg-primary p-2 text-white float-right">Add Model</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('status'))
                        <h6>{{session('status')}}</h6>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Show/Hide</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($subcategory as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>
                                <img src="{{asset('uploads/subcategory/'.$item->image)}}" style="width: 50px"/>
                            </td>
                            <td>
                                <input type="checkbox" {{$item->status == '1'? 'checked':''}}>
                            </td>
                            <td>
                                <a href="{{url('subcategory-edit/'.$item->id)}}" class="badge btn-primary">Edit</a>
                                <a href="{{url('subcategory-delete/'.$item->id)}}" class="badge btn-danger">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>


    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-5">
        <div class ="card mb-4 wow fadeIn">
            <div class="card-body">
                <h6 class="mb-0">
                    Collections/Model Edit
                    <a href="{{url('sub-category')}}" class=" badge bg-danger p-2 text-white float-right">Back</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('sub-category-update/'.$subcategory->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category ID(Name)</label>
                                <select name="category_id" class="form-control">
                                    <option value="{{$subcategory->category_id}}">{{$subcategory->category->name}}</option>
                                    @foreach ($category as $cateitem)
                                        <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{$subcategory->name}}" class="form-control" placeholder="Enter Name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""> Custom Url(SLUG)</label>
                                <input type="text" name="url" value="{{$subcategory->url}}" class="form-control" placeholder="Enter Name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea rows="4" name="description" class="form-control" placeholder="Enter Description">{{$subcategory->description}}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset('uploads/subcategory/'.$subcategory->image)}}"width="100px"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Priority</label>
                                <input type="number" name="priority"  value="{{$subcategory->priority}}" class="form-control" placeholder="Enter Name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Show / Hide</label>
                                <input type="checkbox" name="status" {{$subcategory->status == '1'?'checked':''}} class="">

                            </div>
                        </div>
                        <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>


        </div>
    </div>


    </div>
@endsection

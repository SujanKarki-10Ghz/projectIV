@extends('layouts.admin')
@section('content')
    <!--Heading-->
    <div class="container-fluid mt-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 wow fadeIn">
                    <div class="card-body">
                        <h6 class="mb-0">
                            Collection/ Category Edit
                            <a href="{{url('category')}}" class=" badge bg-danger p-2 text-white float-right">Back</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{url('category-update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Group ID(Name)</label>
                                        <select name="group_id" class="form-control">
                                            <option value="{{$category->group_id}}">{{$category->group->name}}</option>
                                            @foreach($group as $gitem)
                                                <option value="{{$gitem->id}}">{{$gitem->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Enter Name">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Custom Url(SLUG)</label>
                                        <input type="text" name="url" class="form-control" value="{{$category->url}}" placeholder="Enter Name">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"> {{$category->description}}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="category_img" class="form-control">
                                        <img src="{{asset('uploads/categoryimage/'.$category->image)}}"width="50px"/>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Icon</label>
                                        <input type="file" name="category_icon" class="form-control">
                                        <img src="{{asset('uploads/categoryicon/'.$category->icon)}}"width="50px"/>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status" {{$category->status == '1'?'checked':''}}>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary" >Update</button>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
@endsection

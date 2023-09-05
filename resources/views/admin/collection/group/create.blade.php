@extends('layouts.admin')
@section('content')
    <!--Heading-->
    <div class="container-fluid mt-6">
        <div class="row">
            <div class="col-md-12">
               <div class="card mb-4 wow fadeIn">
                   <div class="card-body">
               <h6>Collection/ Add Company </h6>
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
                    <form action="{{url('group-store')}}" method="POST">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Custom Url(Slug)</label>
                                <input type="text" name="url" class="form-control" placeholder="Enter URL">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea rows="4" name="descrip" class="form-control" placeholder="Enter Description"></textarea>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Show / Hide</label>
                                <input type="checkbox" name="status" class="">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" >Save</button>

                            </div>
                        </div>

                </div>
                    </form>
            </div>
        </div>
    </div>



    </div>
@endsection

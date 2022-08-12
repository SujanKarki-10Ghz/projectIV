@extends('layouts.admin')
@section('content')
    <div class="container-fluid mb-5" xmlns="http://www.w3.org/1999/html">
        <div class="card mb-3 wow fadeIn">
            <div class="card-body d-inline-block justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <span>Registered Users -Edit Role</span>
                </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Current Role: {{$user_roles->role_as}}</h4>
                        <h5>
                            isBan Status:
                            @if($user_roles->isban =='0')
                               <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                            @elseif($user_roles->isban =='1')
                                <label class="py-2 px-3 badge btn-danger"> Banned</label>

                            @endif
                        </h5>
                    <form action="{{url('role-update/'.$user_roles->id)}}" method="POST">
                        {{csrf_field()}}
                        @method('PUT')
                    <div class="form-group">
                        <input type="text"name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$user_roles->name}}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
                    <div class="form-group">
                        <input type="text" class="form-control" readonly value="{{$user_roles->email}}">
                    </div>
                    <div class="form-group">
                        <select name="roles" class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}">
                            <option value="">--Select Role--</option>
                            <option value=" ">Default</option>
                            <option value="admin">Admin</option>
                        </select>
                        @if ($errors->has('roles'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                        @endif
                    </div>
                        <div class="form-group">
                            <select name="isban" class="form-control" required>
                                <option value="">--Select Ban and Unban--</option>
                                <option value="0">Un-ban</option>
                                <option value="1">Ban now</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>


@endsection

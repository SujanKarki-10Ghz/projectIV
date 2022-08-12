@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <div class="card-body d-inline-block justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <span>Registered Users</span>
                </h4>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>
                    @php $u_total = "0"; @endphp
                    @foreach($users as $item)
                        @php
                        if ($item->isUserOnline())
                        {
                            $u_total = $u_total+1;
                        }
                        @endphp
                    @endforeach
                    Total User Online: {{$u_total}}
                </h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Online/Offline</th>
                        <th class="text-center">isBan/unBan</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name}}</td>
                        <td> {{ $item->email}}</td>
                        <td> {{ $item->role_as}}</td>
                        <td>
                            @if($item->isUserOnline())
                                <label class="py-2 px-3 badge btn-success">Online</label>
                            @else
                            <label class="py-2 px-3 badge btn-warning">Offline</label>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($item->isban =='0')
                                <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                                @elseif($item->isban =='1')
                                <label class="py-2 px-3 badge btn-danger"> Banned</label>
                                @endif
                            </td>
                        <td>
                            <a href="{{url('role-edit/'.$item->id)}}" class="btn btn-primary">EDIT</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
            </div>
        </div>
    </div>
</div>


@endsection

@extends("layouts.frontend")
@section('content')
<section class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>My Profile Page</h4>
                    <hr>
                    <form action="{{url('my-profile-update')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->lname}}">
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email Id</label>
                                    <input type="text" class="form-control"  readonly value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address 1 (Flat No, Apt No & Address)</label>
                                    <input type="text" name="address1" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address1}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address 2 (Landmark, near by)</label>
                                    <input type="text" name="address2" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address2}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input type="text" name="state" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->state}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pin Code/Zip Code</label>
                                    <input type="text"  name="pincode" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->pincode}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alternate Phone Number</label>
                                    <input type="text" name="alternate_phone" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->alternate_phone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="image" class="form-control"><br>
                                <img  name="image" src="{{asset('uploads/profile/'.\Illuminate\Support\Facades\Auth::user()->image)}}" alt="">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</div>

</section>

@endsection

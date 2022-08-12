@extends("layouts.frontend")
@section('title')
    Offered
@endsection
@section('content')
    <Section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h4 class="border-bottom"> Offered Products
                        </h4>
                    </div><!--col-md-12-->
                    @foreach($products as $offeritems)
                        <div class="col-md-3 mt-3">
                            <div class="card shadow">
                                <img src="{{asset('/uploads/products/'.$offeritems->image)}}" class="w-100" alt="product image">
                                <div class="card-body text-center">
                                    <h5 class="font-weight-bold text-truncate"> {{$offeritems->name}}</h5>
                                    <h6 class="">
                                        <span class="font-italic mr-2"><s>Rs:{{$offeritems->original_price}}</s></span>
                                        <span class="font-weight-bold">Rs: {{$offeritems->offered_price}}</span>
                                    </h6>
                                    <a href="{{url('collection/'.$offeritems->subcategory->category->group->url.'/'.$offeritems->subcategory->category->url.'/'.$offeritems->subcategory->url.'/'.$offeritems->url)}}" class="btn btn-outline-primary btn-block">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--row-->
            </div><!--container-->
        </div><!--py-5-->
    </Section>
@endsection

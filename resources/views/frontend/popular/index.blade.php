@extends("layouts.frontend")
@section('title')
    Popular Products
@endsection
@section('content')
    <Section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h4 class="border-bottom">Popular Products
                        </h4>
                    </div><!--col-md-12-->
                    @foreach($products as $popularitems)
                        <div class="col-md-3 mt-3">
                            <div class="card shadow">
                                <img src="{{asset('/uploads/products/'.$popularitems->image)}}" class="w-100" alt="product image">
                                <div class="card-body text-center">
                                    <h5 class="font-weight-bold text-truncate"> {{$popularitems->name}}</h5>
                                    <h6 class="">
                                        <span class="font-italic mr-2"><s>Rs:{{$popularitems->original_price}}</s></span>
                                        <span class="font-weight-bold">Rs: {{$popularitems->offered_price}}</span>
                                    </h6>
                                    <a href="{{url('collection/'.$popularitems->subcategory->category->group->url.'/'.$popularitems->subcategory->category->url.'/'.$popularitems->subcategory->url.'/'.$popularitems->url)}}" class="btn btn-outline-primary btn-block">
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

@extends('layouts.frontend')
@section('title')
    {{$products->meta_title}}
@endsection
@section('meta_desc')
    {{$products->meta_description}}
@endsection
@section('meta_tags')
    {{$products->meta_keyword}}
@endsection
@section('content')
    <section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="product_data">
                <div class="row">
                        <div class=" col-md-12 mb-3">
                            <div class= "row">
                                <div class="col-md-5">
                                    <div class="border">
                                                <img src="{{asset('uploads/products/'.$products->image)}}"  class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="py-2">
                                                <small class="text-gray mb-0">Collection>
                                                    {{$products->subcategory->category->group->name}}>
                                                    {{$products->subcategory->category->name}}>
                                                    {{$products->subcategory->name}}>
                                                    {{$products->name}}
                                                    </small>
                                            </div>
                                            <div class="product-heading py-2 border-top">
                                                <h5 class="mb-0 font-weight-bold">{{$products->name}}</h5>
                                            </div>
                                        <div class="py-2">
                                            <small>Rating:
                                                @for($i=1; $i<=5; $i++)
                                                <i class="fa fa-star text-warning"></i>
                                                @endfor
                                            </small>
                                            <small class="font-italic badge badge-primary ml-3 px-2">{{$products->sale_tag}}</small>
                                        </div>
                                            <div class="product-price">
                                            <h5>
                                                <span class="offered-price"> Rs: {{number_format($products->offered_price)}}</span>
                                                <span class="selling-price"><s>Rs: {{number_format($products->original_price)}}</s></span>
                                            </h5>

                                        </div>
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-md-2 col-3">
                                                        <input type="hidden" class="product_id" value="{{$products->id}}">
                                                        <input type="number" class="qty-input form-control" value="1" min="1" max="100"/>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <button type="button" class=" add-to-cart-btn btn btn-danger m-0 py-2 px-3">Add to Cart</button>
                                                    </div>
                                                </div>
                                             </div>
                                            <div class="product-small-description py-2 border-top">
                                                {!! $products->small_description !!}
                                            </div>
                                      </div>
                                <div class="col-md-12">
                                    <div class="product-highlights py-2 border-top">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="highlight-heading mb-0 font-weight-bold">{{$products->p_highlight_heading}}</h6>
                                            </div>
                                            <div class="card-body">
                                                {!! $products->p_highlights!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-description py-2 border-top">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="prod-desc-heading mb-0 font-weight-bold">{{$products->p_description_heading}}</h6>
                                            </div>
                                            <div class="card-body">
                                                {!! $products->p_description!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-details py-2 border-top">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="prod-detail-heading mb-0 font-weight-bold">{{$products->p_details_heading}}</h6>
                                            </div>
                                            <div class="card-body">
                                                {!! $products->p_details!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="font-weight-bold">Related Products</h4>
                    <hr>
                    <div class="owl-carousel owl-theme">
                        @foreach($products->subcategory->products as $item)
                        <div class="item">
                            <div class="card border">
                                <div class="card-body">
                                    <img src="{{asset('uploads/products/'.$item->image)}}" class="w-100" alt="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="font-weight-bold">{{$item->name}}</h6>
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="font-weight-bold">Rs:{{number_format($item->offered_price)}}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="font-italic"><s>Rs: {{number_format($item->original_price)}}</s></h6>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="" class="btn btn-block btn-outline-primary">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </section>
@endsection
@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection

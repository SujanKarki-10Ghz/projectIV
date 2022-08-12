@extends('layouts.frontend')
@section('title')
    Collection - Category - SubCategory - Products
@endsection
@section('content')
    <div class="card mb-5 card py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label class="mb-0">Collection/ {{$subcategory->category->group->name}} /{{$subcategory->category->name}}/{{$subcategory->name}}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <span class="font-weight-bold sort-font">Sort By :</span>
                <a href="{{URL::current()}}" class="sort-font"> All </a>
                <a href="{{URL::current()."?sort=price_asc"}}" class="sort-font"> Price - Low to High </a>
                <a href="{{URL::current()."?sort=price_desc"}}" class="sort-font"> Price - High to Low </a>
                <a href="{{URL::current().'?sort=newest'}}" class="sort-font"> Newest </a>
                <a href="{{URL::current().'?sort=popularity'}}"  class="sort-font"> Popularity </a>
            </div>
            <div class="col-md-3">
                <form action="{{ URL::current() }}" method="GET">
                    <div class="card">
                        <div class="card-header">
                            <h5>Brands
                            <button type="submit" class="btn btn-primary btn-sm float-right">Filter</button>
                            </h5>
                        </div>
                    <div class="card-body">
                        @foreach($subcategorylist as $itemcate)
                            @php
                            $checked =[];
                            if(isset($_GET['filterbrand']))
                                {
                                    $checked= $_GET['filterbrand'];
                                }
                            @endphp
                        <div class="mb-1">
                            <input type="checkbox" name="filterbrand[]" value="{{$itemcate->id}}"
                            @if(in_array($itemcate->id, $checked))checked
                                @endif
                            />
                            {{$itemcate->name}}
                        </div>
                        @endforeach
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $prod_item)
                        <div class="col-md-12 mb-3">
                            <div class= "card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="">
                                                <img src="{{asset('uploads/products/'.$prod_item->image)}}"  class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7 border-right border-left">
                                            <a href="{{url('collection/'.$prod_item->subcategory->category->group->url.'/'.$prod_item->subcategory->category->url.'/'.$prod_item->subcategory->url.'/'.$prod_item->url)}}" class="text-center">
                                                <h5 class="mb-2">{{$prod_item->name}}</h5>
                                               </a>
                                            <div class=" ">
                                                <h6 class="text-dark mb-0">{!! $prod_item->p_highlights !!}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-right">
                                                <h6 class="font-italic text-dark badge badge-warning px-3 py-1">{{$prod_item->sale_tag}}</h6>
                                                <h6 class="font-italic"><s> Rs: {{number_format($prod_item->original_price)}}</s></h6>
                                                <h5 class="font-italic font-weight-bold"> Rs: {{number_format($prod_item->offered_price)}}</h5>
                                             </div>
                                            <div class="text-right">
                                            <a href="{{url('collection/'.$prod_item->subcategory->category->group->url.'/'.$prod_item->subcategory->category->url.'/'.$prod_item->subcategory->url.'/'.$prod_item->url)}}" class="btn btn-outline-primary py-1 px-2">
                                            View Details
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection

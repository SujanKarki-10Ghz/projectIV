@extends("layouts.frontend")
@section('content')
    @include('frontend.slider.slider')
    <Section>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <h4 class="border-bottom">New Arrivals
                        <a href="{{url('new-arrivals')}}" class="btn btn-primary float-right">View All</a>
                        </h4>
                    </div><!--col-md-12-->
                    <div class="owl-carousel owl-theme">
                    @foreach($products as $newarrivalitems)
                    <div class="item">
                        <div class="card">
                        <img src="{{asset('/uploads/products/'.$newarrivalitems->image)}}" class="w-100" alt="product image">
                        <div class="card-body text-center">
                            <h5 class="font-weight-bold text-truncate"> {{$newarrivalitems->name}}</h5>
                            <h6 class="">
                                <span class="font-italic mr-2"><s>Rs:{{$newarrivalitems->original_price}}</s></span>
                                <span class="font-weight-bold">Rs: {{$newarrivalitems->offered_price}}</span>
                            </h6>
                            <a href="{{url('collection/'.$newarrivalitems->subcategory->category->group->url.'/'.$newarrivalitems->subcategory->category->url.'/'.$newarrivalitems->subcategory->url.'/'.$newarrivalitems->url)}}" class="btn btn-outline-primary btn-block">
                                View Details
                            </a>
                         </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div><!--row-->
                <div class="row my-5 p-4">
                    <div class="col-md-4">
                        <div class="service-block-inner">
                            <h3 class="border-bottom font-weight-bold">Contact Us</h3>
                            <p><i class="fa fa-map"></i>Address:Subidhanagar,Tinkune,Kathmandu</p>
                            <p><i class="fa fa-phone"></i>Phone: <a href="tel:+977 9841544344">+977 9841544344</a></p>
                            <p><i class="fa fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-block-inner">
                            <h3 class="border-bottom font-weight-bold">Socials</h3>
                            <p><i class="fa fa-whatsapp"></i>WhatsApp: <a href="tel:+977 9841544344">+977 9841544344</a></p>
                            <p><i class="fa fa-facebook"></i>Facebook: <a href="https://www.facebook.com/">Hamro Store</a></p>
                            <p><i class="fa fa-instagram"></i>Instagram: <a href="https://www.instagram.com/">Hamro_Store</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-block-inner">
                            <h3 class="border-bottom font-weight-bold">About Us</h3>
                            <p>We are Hamro Store, aimed at providing the best quality and best laptop & accessories of PC at cheapest price possible.</p>
                        </div>
                    </div>
                </div>
            </div><!--container-->
        </div><!--py-5-->
    </Section>
@endsection
@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:true,
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

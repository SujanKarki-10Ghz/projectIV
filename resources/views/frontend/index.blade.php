@extends("layouts.frontend")

@section('content')
    @include('frontend.slider.slider')
    <Section class="py-4">
        <div class="jumbotron">
                    <div class="title-all text-center">
                        <h1>Products</h1>
                        <p>Our products include all the clothing items for men, women and kids</p>
                    </div>
                </div>
        <div class="categories-shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/tshirt.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Plain-T-shirts</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/half-sleeve-shirts.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Half-Sleeve-Shirts</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/women-jeans.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Women-Jeans</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/kids-clothes.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Kids-Clothes</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/Tankwa-jeans.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Tankwa-Jeans-Men</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/half-pants.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Half-Pants-Men</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="products-box">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>Featured Products</h1>
                            <p>We have featured products according to demand and need of our valued customers.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{URL('images/vans.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Vans-Classic-Hoodie</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                </div>
            </div>
            </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/BTS.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">BTS-Hoodie</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$9.99</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{URL('images/naruto.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Naruto-Hoodie</h5>
                                <p class="card-text"></p>
                                <a href="#" class="btn btn-outline-danger btn-block">$11.99</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumbotron">
                <div class="title-all text-center">
                    <h1>Contact Us</h1>
                    <p1>You can contact us through Viber, Instagram, and Facebook</p1>
                </div>
            </div>

        </div>

    </Section>
@endsection

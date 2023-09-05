<nav class="navbar navbar-expand-sm sticky-top navbar-dark" style="background-color:#1b1d21" >
    <img src="{{URL('/images/hamrostore.png')}}" alt="Hamro Store" style="width:40px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md-5 my-auto">
        <form id="search-form" action="{{ url('/searching') }}" method = "POST">
            @csrf
        <div class="input-group">
            <input type="text" name= "search_product" id="search_text" class="form-control" placeholder="Search here...">
            <button type="submit" name="searchbtn" class="input-group-text" id="basic-addon2">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-white"  href="{{url('/')}}"><i class="fa fa-fw fa-home"></i>Home <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('about-us')}}"><i class=" fa fa-fw fa-book"></i> About Us </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color:white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-product-hunt"></i>
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('new-arrivals')}}">New Arrivals</a>
                    <a class="dropdown-item" href="{{url('featured')}}">Featured</a>
                    <a class="dropdown-item" href="{{url('popular-products')}}">Popular</a>
                    <a class="dropdown-item" href="{{url('offer-products')}}">Offer</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect text-white" href="{{url('/cart')}}">
                <i class="fa fa-shopping-cart"></i>
                    <span class="clearfix">
                        Cart
                    <span class="basket-item-count">
                    <span class="badge badge-pill red"> 0 </span>
                </span>
            </span>
                </a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#LoginModal">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a  href="{{url('my-profile')}}" class="dropdown-item">
                            My Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
<div class="row">
    <div class="col-md-12 py-2 bg-dark">
        @php
        $group = App\Models\Groups::where('status', '!=', '2')->get();
        @endphp
        @foreach($group as $group_nav_item)
            <a href="{{ url('collection/'.$group_nav_item->url)}}" class="px-4 text-white">{{$group_nav_item->name}}</a>
        @endforeach
    </div>
</div>
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                </form>
            </div>
            {{--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>--}}
        </div>
    </div>
</div>




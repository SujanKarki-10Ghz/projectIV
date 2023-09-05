<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <button class="btn-primary border-0">
            <i class="fas fa-home"></i>
        <a href="{{url('dashboard')}}" class="text-white text-decoration-none hover-shadow">Hamro Store</a>
        </button>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name.' '.\Illuminate\Support\Facades\Auth::user()->lastname }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                {{--//<a class="dropdown-item" href="{{url('my-profile')}}">My Profile</a>--}}
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>


    </div>
    <!-- Container wrapper -->
</nav>

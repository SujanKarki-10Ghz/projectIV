<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white shadow">
    <div class=" position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="{{url('dashboard')}}" class="list-group-item list-group-item-action py-2 ripple btn-primary" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
            </a>
            <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-clipboard-list"></i> <span>About</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{url('group')}}">Company</a>
                <a class="dropdown-item" href="{{url('category')}}">Category</a>
                <a class="dropdown-item" href="{{url('sub-category')}}">Model</a>
                <a class="dropdown-item" href="{{url('products')}}">Product(items)</a>
            </div>
            <a href="{{url('orders')}}" class="list-group-item list-group-item-action py-2 ripple text-black"><i
                    class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
            <a href="{{url('registered-user')}}" class="list-group-item list-group-item-action py-2 ripple text-black   "><i
                    class="fas fa-users fa-fw me-3"></i><span> Registered Users</span></a>
        </div>
    </div>
</nav>

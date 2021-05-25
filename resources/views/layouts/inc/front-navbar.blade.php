<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <img src="{{URL('/images/logo1.png')}}" alt="SPB" style="width:50px;">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu bg-white" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Man</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Kids</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#"> Contact Us </a>
            </li>
            <li class=" nav-item ">
                <a class =" nav-link " href="#">Login</a>

            </li>
            <li class=" nav-item ">
                <a class =" nav-link " href="#">Register</a>

            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

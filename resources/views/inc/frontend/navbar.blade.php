<div class="main-navbar shadow-sm sticky-top bg-white">

    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">
                        Zenin
                    </h5>
                </div>
                <div class="col-md-5 my-auto">
                    <form role="search">
                        <div class="input-group">
                            <input type="search" placeholder="Searh your product" class="form-control" />
                            <button class="btn btn-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-shopping-cart"></i> Cart (0)
                            </a>
                        </li>

                        <li class=" {{ (request()->is('wishlist'))  ? 'bg-success' : '' }} nav-item"  >
                            <a href="{{ url('wishlist') }}" class="nav-link">
                                <i class="fa fa-heart"></i> Wishlist (<livewire:wishlist-count />)
                            </a>
                        </li>

                        @guest
                        @if (Route::has('login'))
                        <li class=" {{ (request()->is('login'))  ? 'bg-success' : '' }} nav-item"  >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                        <li class=" {{ (request()->is('register'))  ? 'bg-success' : '' }} nav-item"  >
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>  {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="" class="dropdown-item"><i class="fa fa-user"></i>Profile</a></li>
                                <li><a href="" class="dropdown-item"><i class="fa fa-list"></i>My Orders</a></li>
                                <li>
                                    <a href="" class="dropdown-item"><i class="fa fa-heart"></i>My Wishlist</a></li>
                                <li><a href="" class="dropdown-item"><i class="fa fa-shopping-cart"></i>My Cart</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>

                                </li>
                            </ul>
                        </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="" class="navbar-brand d-block d-sm-block d-md-none d-lg-none">
                Zenin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse-navbar-college" id="nav">
                <ul class="navbar-nav me-auto mb-2 mb-l-0">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/collections') }}" class="nav-link">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/new-arrivals') }}" class="nav-link">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Fashion</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Accesories</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Appliance</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>

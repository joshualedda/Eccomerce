<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages/forms/basic_elements.html">
                    <i class="mdi mdi-view-headline menu-icon"></i>
                    <span class="menu-title">Sales</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="mdi mdi-database menu-icon"></i>
                    <span class="menu-title">Category</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/admin/category">Categories</a></li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/products') }}">
                    <i class="mdi  mdi-shopping menu-icon"></i>
                    <span class="menu-title">Products</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/brand') }}">
                    <i class="mdi mdi-cart menu-icon"></i>
                    <span class="menu-title">Brands</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/colors') }}">
                    <i class="mdi mdi-cart menu-icon"></i>
                    <span class="menu-title">Colors</span>
                </a>
            </li>







            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/sliders') }}">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Home Slider</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#setting" aria-expanded="false"
                    aria-controls="setting">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>

                <div class="collapse" id="setting">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/profile') }}">Profile</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html">Users</a></li>
                </div>
            </li>


            {{-- User User --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">User Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/profile') }}">Profile</a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">Users</a></li>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="documentation/documentation.html">
                    <i class="mdi mdi-logout text-primary menu-icon"></i>
                    <span class="menu-title">Log Out</span>
                </a>
            </li>




        </ul>
    </nav>

@include('partials.header')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">


                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-1 w-100">
                                <img src="{{ asset('assests/img/logo.png') }}" width="90" alt="">
                            </a>
                            <p class="text-center">Shop Galore</p>
                            <div id="success-alert" class="alert alert-danger d-none" role="alert">

                            </div>
                            <form id="loginForm" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check"></div>
                                    <a class="text-primary fw-bold" href="./index.html">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                    In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0">Don't have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ url('/register') }}">Create an account</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')

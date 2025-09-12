<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CSRF Token for AJAX requests -->
    @yield('meta')

    <style>
        #togglePas {
            float: right;
            margin: -30px 0px 0px -25px;
            right: 10px;
            position: relative;
            z-index: 2;
            color: #333333;
        }
    </style>


    <!-- Bootstrap CSS & Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css">


    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!--Animation css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('user/js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>
    <!-- Start Header  id="header" link from cart.blade.php in javascript-->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-lg-0" style="cursor:alias;">
                <img src="{{ asset('images/logo.png') }}" class="me-3" alt="">
                <h1><span>Dragon City</h1>
            </a>
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/#home">Home</a></li>
                    <li><a href="/#product">Products</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#events">Events</a></li>
                    <li><a href="/#gallery">Gallery</a></li>
                    <li><a href="/#contact">Contact</a></li>
                    <li class="dropdown"><a href="#"><span>Account</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>

                            @if (!Auth::user())
                                <li><a href="{{ route('login') }}" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-login">Login <i
                                            class="fa-solid fa-right-to-bracket"></i></a></li>

                                <li><a href="{{ route('register') }}" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        Register <i class="fa-solid fa-user-plus"></i></a>
                                    {{-- {{ route('register') }}  --}}
                                </li>
                            @else
                                <li><a href="{{ route('profile') }}">Account Profile <i
                                            class="fa-solid fa-user-gear"></i></a></li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <li>
                                        <a href=""><input type="submit" value="Logout"
                                                class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-right-from-bracket"></i></a>
                                    </li>
                                </form>
                            @endif

                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- .navbar  end -->


            @if (Auth::user())
                @if (Auth::user()->role == 'admin')
                    <a class="btn-book-a-table" href="{{ route('admin.dashboard') }}"><i
                            class="fa-solid fa-house-user me-2"></i>Admin</a>
                @else
                    {{-- dragoncity link --}}
                    @yield('cartBtn')
                    {{-- <i class="fa-solid fa-cart-shopping"></i> --}}
                @endif
            @endif

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <!-- End Header -->



    <!-- Register Modal -->

    <div class="modal  modal-lg fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent  ">

                <button type="button" class="btn-close offset-lg-11 mt-4" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-header justify-content-center">
                    <img class="inline-block d-flex flex-col" src="{{ asset('images/logo.png') }}" alt="logo"
                        width="80" height="80">
                    <h1 class="text-success fw-bold fs-5 mt-2">Account Registration</h1>
                </div>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="modal-body text-pretty text-white">

                        <div class="row p-2 ">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror "
                                        name="name" id="name" placeholder="Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye" id="eyeIconPassword"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="confirmPassword" placeholder="Confirm password">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="toggleConfirmPassword">
                                            <i class="bi bi-eye" id="eyeIconConfirm"></i>
                                        </button>
                                    </div>
                                </div>

                            </div> <!--End first col-6-->

                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror"
                                        name="age" id="age" placeholder="Age"
                                        value="{{ old('age') }}">
                                    @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-check form-check-inline mt-5 ">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                        value="male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                        value="female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" placeholder="Tel - 09689491869"
                                        value="{{ old('phone') }}" pattern="[0-9]{9,15}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!--col-6-->

                        </div><!--row-->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        <input type="submit" class="btn btn-danger px-3" value="Register">

                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- End Register Modal -->



    <!-- Log in Model -->
    <div class="modal fade " id="staticBackdrop-login" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-transparent"
                style="background-color: #333333;
  box-shadow: 0 4px 12px rgba(49, 42, 42, 0.15);">
                <button type="button" class="btn-close btn-close-white offset-11 mt-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-header justify-content-center">
                    <img class="inline-block" src="{{ asset('images/logo.png') }}" alt="logo" width="60"
                        height="80">
                    <h1 class="modal-title fs-5 fw-bolder text-primary" id="staticBackdropLabel">Account Login</h1>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="modal-body p-4 text-white">

                        <div class="mb-4">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <p><label for="">Password</label>
                            <input type="password" name="password" placeholder="Password" id="pas"
                                class="form-control pas ">
                            <i class="bi-eye" id="togglePas"></i>

                        </p>


                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                        <input type="submit" class="btn btn-danger px-3" value="Login">

                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- End Log in -->








    @yield('content')








    {{-- ---------------------------------------------
    ----------------[ Footer ] -----------------
    --------------------------------------------- --}}

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer" style="margin-top: 0vh;">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Hotline</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> DataDock.Admin@gmail.com <br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 9AM</strong> - 8PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>DATADOCK</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <strong><span>UNity</span></strong>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->





    <!-- Scroll Up Arrow -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>







</body>


{{-- ------------ [ JavaScript Link] ------------- --}}

<!-- Template Main JS File -->




<!-- Vendor JS Files -->
<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('user/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('user/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('user/vendor/php-email-form/validate.js') }}"></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>



<!-- JavaScript Libraries -->

{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>




@yield('qtyjscode')
{{-- @yield('cartjscod') --}}







<script>
    $(document).ready(function() {
        $('#togglePas').ready(function() {
            // const togglePassword = document.querySelector('#togglePas');
            const togglePassword = document.getElementById('togglePas');

            const password = document.querySelector('.pas');
            togglePassword.addEventListener('click', (e) => {

                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                console.log(type);
                let ps = password.setAttribute('type', type);
                // ps= $('#password').val(ps);
                console.log(ps);

                e.target.classList.toggle("bi-eye");
                e.target.classList.toggle('bi-eye-slash');
            })
        });

        // Password toggle
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const eyeIconPassword = document.getElementById("eyeIconPassword");

        togglePassword.addEventListener("click", () => {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            eyeIconPassword.classList.toggle("bi-eye");
            eyeIconPassword.classList.toggle("bi-eye-slash");
        });

        // Confirm Password toggle
        const confirmPassword = document.getElementById("confirmPassword");
        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
        const eyeIconConfirm = document.getElementById("eyeIconConfirm");

        toggleConfirmPassword.addEventListener("click", () => {
            const type = confirmPassword.type === "password" ? "text" : "password";
            confirmPassword.type = type;
            eyeIconConfirm.classList.toggle("bi-eye");
            eyeIconConfirm.classList.toggle("bi-eye-slash");
        });

    });
</script>









</html>

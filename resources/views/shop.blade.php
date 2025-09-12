@extends('layout')

<!-- CSRF Token for AJAX requests -->
{{-- @section('meta', '<meta name="csrf-token" content="{{ csrf_token() }}">') --}}
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<!-- End CSRF Token for AJAX requests -->


<!-- Page Title -->
@section('title', 'Shop Page')

@section('content')
    {{-- {{dd($productData->toArray())}} --}}

    <!-- Contact Create Success Message -->
    {{-- <div class="col-lg-6 offset-lg-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div> --}}

    <!-- shop -->
    <div class="container px-5" style="margin-top: 150px; margin-bottom:150px;">
        <div class="row justify-content-center">
            <div id="mes"></div>
            <!-- image -->
            <div class="col-lg-4">
                <div class="section-title text-center">
                    <img src="{{ asset('storage/products/' . $data->image) }}" alt="laptop image" class="img-fluid"
                        style="height:300px; width:400px; border-radius:10px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                </div>
            </div>
            <!-- details -->
            <div class="col-lg-6">
                <div class="section-title">
                    <h5 class="text-danger mt-5">{{ $data->category_name }}</h5>
                    <h2>{{ $data->name }}</h2>

                    <div class="text-warning">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <h4 class="mt-4 text-danger"><span class=" text-secondary">Price: </span><i
                            class="fa-solid fa-dollar-sign me-2"></i>{{ $data->price }}</h4>
                    <p class="mt-4">{{ $data->description }}</p>

                    @if (Auth::user())
                        @if (Auth::user()->role == 'user')
                            <div class="d-flex align-items-center gap-1 mt-4">

                                <button id="minusBtn" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-minus"></i></button>

                                <input type="type" id="qty" value="1" class="form-control mx-1 text-center"
                                    style="width: 50px; ">
                                <button id="plusBtn" class=" btn btn-sm btn-primary "><i
                                        class="fa-solid fa-plus"></i></button>

                                <button id="cartBtn" class="btn btn-sm btn-primary ms-3 px-2"><i
                                        class="fa-solid fa-cart-shopping me-2"></i>
                                    Add to Cart
                                </button>

                                <!--User Id and Product Id-->
                                <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" id="product_id" value="{{ $data->id }}">
                            </div>
                        @endif
                    @else
                        <div class="alert alert-warning animate__animated animate__bounce animate__flipInX mt-4"
                            role="alert">
                            If you want to buy this product, please <a href="{{ route('login') }}"
                                class="alert-link text-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop-login"><u style="text-decoration-style: dashed;">Login</u></a>.
                            If you have no account, make register <i class="fa-solid fa-hand-point-right "></i> <a
                                href="{{ route('register') }}" class="alert-link text-primary" data-bs-toggle="modal"  data-bs-target="#staticBackdrop"><u>Register</u></a>.
                        </div>
                        {{-- <div class="alert alert-warning animate__animated animate__bounce animate__rotateInUpRight mt-0" role="alert">

                        </div> --}}
                    @endif

                </div>
            </div>
        </div>

    </div>


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
    <div class="modal fade " id="staticBackdrop-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="Email" value="{{ old('email') }}">
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

@endsection




@section('qtyjscode')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let qty = parseInt($('#qty').val());
            console.log(qty);

            //plus button
            // $('#plusBtn').click(function(e)
            // e.preventDefault();
            // $('#plusBtn').on('click', function() {
            $('#plusBtn').click(function() {
                qty += 1;
                $('#qty').val(qty);

            });


            //minus button
            // $('#minusBtn').click(function(e)
            // e.preventDefault();
            // $('#minusBtn').on('click', function() {
            $('#minusBtn').click(function() {

                if (qty > 1) {
                    qty -= 1;
                    $('#qty').val(qty);
                }
            });

            //cart button
            // $('#cartBtn').click(function(e)
            // e.preventDefault();
            // $('#cartBtn').on('click', function() {
            $('#cartBtn').click(function() {
                // let qty = parseInt($('#qty').val());
                let product_id = $('#product_id').val();
                let user_id = $('#user_id').val();

                $.ajax({
                    type: 'post',
                    url: '/cart/add',
                    data: {
                        // _token: '{{ csrf_token() }}',
                        'product_id': product_id,
                        'qty': qty,
                        'user_id': user_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response == 304) {
                            // alert("Hello");
                            $('#info').remove();

                            $('#mes').after(`
                           <div class="text-center text-danger p-4" id="info" role="alert" style="margin-top:0px;">
                            <h1 class="animate__animated animate__bounce animate__zoomInDown"><u>This Item already choose!.</u></h1>

                        </div>
                        `);

                        } else {
                            window.location.href = "http://127.0.0.1:8000/";
                            // window.location.href = "http://localhost:8000/";
                        }
                    }



                });


            });



            // $(document).ready(function() {
            //     // let qty=$('#qty').val();
            //     // console.log(qty);
            //     //plus button
            //     $('#plusBtn').click(function(e) {
            //         e.preventDefault();
            //         var qty = parseInt($('#qty').val());
            //         if (qty < 10) {
            //             $('#qty').val(qty + 1);
            //         }
            //     });

            //     //minus button
            //     $('#minusBtn').click(function(e) {
            //         e.preventDefault();
            //         var qty = parseInt($('#qty').val());
            //         if (qty > 1) {
            //             $('#qty').val(qty - 1);
            //         }
            //     });

            //     //cart button
            //     $('#cartBtn').click(function(e) {
            //         e.preventDefault();
            //         var qty = parseInt($('#qty').val());
            //         var product_id = {{ $data->id }};

            //         $.ajax({
            //             url: '/add-to-cart',
            //             method: 'POST',
            //             data: {
            //                 _token: '{{ csrf_token() }}',
            //                 product_id: product_id,
            //                 quantity: qty
            //             },
            //             success: function(response) {
            //                 if (response.status == 'success') {
            //                     alert(response.message);
            //                 } else if (response.status == 'error') {
            //                     alert(response.message);
            //                 }
            //             },
            //             error: function(xhr, status, error) {
            //                 console.error(error);
            //                 alert('An error occurred while adding the product to the cart.');
            //             }
            //         });
            //     });



        });
    </script>


    </script>

@endsection

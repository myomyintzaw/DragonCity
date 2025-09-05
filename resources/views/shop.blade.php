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

    <!-- shop -->
    <div class="container px-5" style="margin-top: 150px; margin-bottom:150px;">
        <div class="row justify-content-center">
            <!-- image -->
            <div class="col-lg-4">
                <div class="section-title text-center">
                    <img src="{{ asset('storage/products/' . $data->image) }}" alt="laptop image" class="img-fluid"
                        style="height:400px; width:400px; border-radius:10px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
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
                        <div class="alert alert-warning mt-4" role="alert">
                            If you want to buy this product, please <a href="{{ route('login') }}"
                                class="alert-link">Login</a>.
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

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
                        window.location.href = "http://127.0.0.1:8000/";
                        // window.location.href = "http://localhost:8000/";
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

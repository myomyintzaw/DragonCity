@extends('layout')

<!-- CSRF Token-->
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<!--End CSRF Token-->

@section('title', 'Cart Shop Page')


@section('content')

    <div class="container-fluid p-5" style="margin-top: 70px;" id="main">

        @if (count($cart_items) == 0)
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Your Cart is <span class="text-danger">Empty</span></h2>
                        <p class="mt-4">Looks like you haven't added any items to your cart yet. Start shopping now to find
                            amazing products!</p>
                        {{-- <a href="{{ route('shop') }}" class="btn btn-primary mt-3">Go to Shop</a> --}}
                    </div>
                </div>
            </div>

            {{-- <script>
                // Load Lottie animation
                var animation = lottie.loadAnimation({
                    container: document.getElementById('lottie-container'),
                    renderer: 'svg',
                    loop: false, // run once
                    autoplay: true,
                    path: '/animations/success.json' // your Lottie file path
                });

                // After animation ends, redirect
                animation.addEventListener('complete', function() {
                    window.location.href = "{{ route('dashboard') }}"; // dragoncity.home  redirect to another page
                });
            </script> --}}
        @else
            <h5 class="mb-5"><i class="fa-solid fa-cart-arrow-down text-danger me-2"> </i>Shopping Cart
            </h5>

            <div class="row shadow rounded  ">
                <!-- Left Side Cart Items-->
                <div class="col-lg-8 col-12 p-4">
                    <table class="table table-borderless  text-center ">
                        {{-- <thead> shadow-sm p-4 rounded
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead> --}}
                        <tbody id="cartItems" class="border-top border-bottom  ">

                            @foreach ($cart_items as $item)
                                <tr class="row  border-bottom  " data-id="{{ $item->id }}">

                                    <!--Remove Btn-->
                                    <td class="col-md-2 d-md-none offset-10 col-2 ">
                                        <a href="">
                                            <i class="fa-solid fa-square-xmark text-danger fs-5" title="delete item"></i>
                                        </a>
                                    </td>

                                    <!-- image-->
                                    <td class="col-md-2 col-12">
                                        <img src="{{ asset('storage/products/' . $item->product_image) }}"
                                            alt="Product Image" class="img-fluid"
                                            style="height: 80px; width: 80px; border-radius:5px;">
                                    </td>

                                    <!-- Product Name-->
                                    <td class="col-md-2 col-12 ">
                                        {{-- <i class="fa-brands fa-product-hunt fa-beat fa-lg" style="color: #FFD43B;">
                                        </i><p>{{ $item->product_name }}</p>  align-items-center --}}
                                        <div
                                            class="input-group d-flex  justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start  gap-1">
                                            <i class="fa-brands fa-product-hunt fa-beat fa-lg" style="color: #FFD43B;"></i>
                                            <div class="p-1"> {{ $item->product_name }}</div>
                                        </div>
                                    </td>


                                    <!-- Price-->
                                    <td class="col-md-2 col-12 ">$ <span id="price"
                                            class="price">{{ number_format($item->product_price, 2) }}</span></td>

                                    <!-- Quantity-->
                                    <td class="col-md-2 col-12">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <!-- Minus Btn-->
                                            <button class="btn btn-sm btn-primary minusBtn"><i
                                                    class="fa-solid fa-minus"></i></button>

                                            <!-- Input qty-->
                                            <input type="text"
                                                class="form-control-sm form-control-plaintext  text-center" id="qty"
                                                value="{{ $item->qty }}" style="width: 20px;" readonly>

                                            <!-- Plus Btn-->
                                            <button class="btn btn-sm btn-primary plusBtn"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </td>

                                    <!--Total-->
                                    <td class="col-md-3 col-12 ">
                                        <div class="input-group d-flex align-items-center justify-content-center gap-1">
                                            <!-- Total Price d-flex align-items-center justify-content-center gap-1-->
                                            {{-- <i class="fa-brands fa-shopify"></i> --}}
                                            <i class="fa-solid fa-clipboard-check  text-info"></i> $<span id="SubPrice"
                                                class="totalPrice">{{ number_format($item->product_price * $item->qty, 2) }}</span>
                                        </div>
                                    </td>


                                    <!--Remove Btn-->
                                    <td class="col-md-1 col-12 d-md-block d-none deleteBtn" style="cursor:pointer">
                                        <i class="fa-solid fa-square-xmark text-danger fs-5" title="delete item"></i>
                                    </td>
                                    <!--Hidden Input Data -->
                                    <input type="hidden" id="cartId" value="{{ $item->id }}">
                                    <input type="hidden" id="productId" value="{{ $item->product_id }}">
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!--End Left Side Cart Items-->

                <!-- Right Side Total Price-->
                <div class="col-lg-4 col-12 p-5 bg-light ">
                    <h4 class="mb-3">Cart Summary</h4>

                    <!--Billing Card-->
                    <div class="mb-4">
                        <a href="#"><img src="{{ asset('images/visa.png') }}" alt="card image"
                                style="width: 70px;"></a>
                        <a href="#"><img src="{{ asset('images/master.png') }}" alt="card image"
                                style="width: 70px;"></a>
                        <a href="#"><img src="{{ asset('images/discover.png') }}" alt="card image"
                                style="width: 70px;"></a>
                        <a href="#"><img src="{{ asset('images/american express.png') }}" alt="card image"
                                style="width: 70px;"></a>
                    </div>


                    <!--Order Total Details-->
                    <div class="mt-5">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6>Items:</h6>
                            {{-- <i class="fa-solid fa-tags text-success me-1"></i> --}}
                            <h6><i class="fa-solid fa-tags fa-bounce text-success me-1"></i><span
                                    id="itemCount">{{ count($cart_items) }}</span> Items </h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom">
                            <h6>Subtotal:</h6>
                            <h6>$ <span id="subTotal">{{ number_format($AllTotal, 2) }}</span></h6>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6>Tax (10%):</h6>
                            <h6>$ <span id="taxAmount"> 10.00</span></h6>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h4>Total:</h4>
                            <h4>$<span id="totalAmount"> {{ number_format($AllTotal + 10, 2) }}</span></h4>
                        </div>

                        <!--Order & Clear Btn-->
                        <div class="d-flex align-items-center justify-content-between my-4">
                            <a href="{{ route('cart.clear') }}">
                                <button id="clearCartBtn" class="btn btn-sm btn-danger me-5 ">Clear </button>
                            </a>

                            <button id="checkoutBtn" class="btn btn-sm btn-success w-50 ">Order</button>
                        </div>
                        {{-- <div>
                            <button id="clearCartBtn" class="btn btn-sm btn-danger w-100 mb-2">Clear Cart</button>
                            <button id="checkoutBtn" class="btn btn-sm btn-success w-100">Order</button>
                        </div> --}}
                        {{-- <div class="my-4">
                            <button class="btn btn-sm btn-primary px-3 me-2">Order</button>
                            <button class="btn btn-sm btn-danger px-3 ">Clear Cart</button>
                        </div> --}}
                        <!--End Order & Clear Btn-->


                        <!-- Notice For Order -->

                        {{-- <div id="orderNotice" class="alert alert-success d-none" role="alert">
                            Your order has been placed successfully!
                        </div> --}}

                        <div class="alert alert-warning" role="alert">
                            <p> <i class="fa-solid fa-truck-fast"></i> Our delivery service is available from <strong>10:00
                                    AM</strong> to <strong>9:00 PM</strong>.
                                Please place your order within this time frame.</p>
                            <i class="fa-solid fa-ship"></i> Shipping is free for orders over $50!, may be a week delay
                            time.After you place the order, we will contact you for more details.
                            <br>

                            Thank you for choosing us!

                        </div>

                        <!--End Notice For Order -->

                    </div>
                    <!--End Order Total Details-->

                </div>
                <!--End Right Side Total Price-->

            </div>




        @endif
    </div>



@endsection




@section('qtyjscode')
    <script>
        $(document).ready(function() {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });


            //plus button
            $('.plusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                qty++;
                tr.find('#qty').val(qty);

                //// let price=tr.find('.price').text();
                // let price=parseFloat(tr.find('.price').text());
                // let price=parseFloat(tr.find('#price').text());
                // let price=parseInt(tr.find('#price').text());
                let str = tr.find('#price').text();

                // remove commas
                const cleaned = str.replace(/,/g, "");

                // convert to integer
                const price = parseInt(cleaned, 10);
                // console.log(price);

                // let formatted = price.replace(/[^0-9.-]+/g,"");

                let totalPrice = (price * qty).toFixed(2);
                // console.log(totalPrice);

                // Add commas as thousand separators
                let formattedTotalPrice = totalPrice.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                // tr.find('.totalPrice').text(totalPrice);
                tr.find('#SubPrice').text(formattedTotalPrice);
                calculate();


                //All Total Price
                // let subTotal = $('#subTotal').text();
                // // console.log(subTotal);
                // // remove commas
                // let clean = subTotal.replace(/,/g, "");
                // console.log(clean);
                // subTotal = parseInt(clean, 10);
                // console.log(subTotal);

                // totalPrice = totalPrice.replace(/,/g, "");
                // totalPrice = parseInt(totalPrice, 10);
                // console.log(totalPrice);

                // subTotal = (subTotal + totalPrice).toFixed(2);
                // console.log(subTotal);

                // let formatted = subTotal.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                // $('#subTotal').text(formatted);
                // $('#subTotal').text(subTotal.toFixed(2));


                // let subTotal += totalPrice;
                // $('#subTotal').text(subTotal.toFixed(2));

            });

            // // let taxAmount=(subTotal*0.1).toFixed(2);
            // let taxAmount=(subTotal*0.1);toFixed(2);
            // $('#taxAmount').text(taxAmount);


            //// $('.plusBtn').click(function() {
            ////     let row = $(this).closest('tr');
            ////     let qtyInput = row.find('input[type="text"]');
            ////     let currentQty = parseInt(qtyInput.val());
            ////     let newQty = currentQty + 1;
            ////     qtyInput.val(newQty);

            ////     // Update total price for the item
            ////     let price = parseFloat(row.find('.price').text());
            ////     let newTotalPrice = (price * newQty).toFixed(2);
            ////     row.find('.totalPrice').text(newTotalPrice);

            ////     // Update cart summary
            ////     updateCartSummary();
            //// });


            //minus button
            $('.minusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = tr.find('#qty').val();
                if (qty > 1) {
                    qty--;
                    tr.find('#qty').val(qty);
                    //let price = tr.find('.price').text();

                    let str = tr.find('#price').text();
                    const cleaned = str.replace(/,/g, "");
                    const price = parseInt(cleaned, 10);

                    let totalPrice = (price * qty).toFixed(2);
                    // tr.find('.totalPrice').text(totalPrice);
                    // console.log(totalPrice);

                    // Add commas as thousand separators
                    let formattedTotalPrice = totalPrice.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    // tr.find('.totalPrice').text(totalPrice);
                    tr.find('#SubPrice').text(formattedTotalPrice);
                    calculate();




                    //All Total Price
                    // let subTotal = $('#subTotal').text();
                    // // console.log(subTotal);
                    // // remove commas
                    // let clean = subTotal.replace(/,/g, "");
                    // console.log(clean);
                    // subTotal = parseInt(clean, 10);
                    // console.log(subTotal);

                    // totalPrice = totalPrice.replace(/,/g, "");
                    // totalPrice = parseInt(totalPrice, 10);
                    // console.log('totalPrice =>', totalPrice);

                    // subTotal = (subTotal - totalPrice).toFixed(2);
                    // console.log(subTotal);
                    // let formatted = subTotal.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    // $('#subTotal').text(formatted);

                }
            });

            // All subtotal calculate
            function calculate() {
                let TotalSub = 0;

                $('tr').each(function(index, row) {
                    TotalSub += parseInt(($(row).find('#SubPrice').text().replace(/,/g, "")), 10);
                    // TotalSub += parseInt($(row).find('#SubPrice').text());

                });
                let Tax = TotalSub + 10;
                Tax = Tax.toFixed(2);
                Tax = Tax.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                console.log(Tax)

                TotalSub = TotalSub.toFixed(2);
                TotalSub = TotalSub.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                console.log(TotalSub);

                $('#subTotal').text(TotalSub);
                $('#totalAmount').text(Tax);

                // $('#totalAmount').text(Tax).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }


            //delete button
            $('.deleteBtn').click(function() {
                let tr = $(this).parents('tr');
                let cartId = parseInt(tr.find('#cartId').val());
                // let productId = tr.find('#productId').val();
                // console.log(cartId,productId);
                // console.log(typeof(cartId));

                $.ajax({
                    type: 'get',
                    url: '/cart/product/delete',
                    data: {
                        'cartId': cartId
                    },
                    datatype: 'json'
                });
                tr.remove();
                calculate();
            });


            //checkoutBtn
            $('#checkoutBtn').click(function() {
                let orderList = [];
                let orderNumber = Math.floor(Math.random() * 10000000000);
                // console.log(typeof orderNumber);
                $('tr').each(function(index, row) {

                    orderList.push({
                        'productId': parseInt($(row).find('#productId').val()),
                        // 'orderNumber': 'rfg' + orderNumber,
                        'orderNumber': `dcy${orderNumber}`,
                        'qty': parseInt($(row).find('#qty').val()),
                        'total': parseInt($(row).find('#SubPrice').text().replace(/,/g,
                            "")),
                    });
                });
                //   orderList.push({_token: $('meta[name="csrf-token"]').attr('content')});

                $.ajax({
                    type: 'POST',
                    url: '/order',
                    // data:Object.assign({},orderList),
                    // datatype: 'json',
                    data: JSON.stringify(orderList),
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // required in web.php routes
                    },
                    success: function(response) {

                        $('#main').remove();

                        $('#header').after(`
                           <div id="lottie"  class="alert alert-success alert-dismissible fade show text-center p-4" role="alert" style="margin-top: 90px;">
                             <strong class="me-2">Order is Success!</strong> Please check order voucher in email.

                        </div>
                        `);
                        // <button type="button" class="btn-close data-bs-dismiss="alert" aria-label="Close"> </button>

                        $('#lottie').after(`<div id="lottie-container" style="width: 300px; height: 300px; margin: auto;"> <dotlottie-wc src="https://lottie.host/ad8b12d5-fbcd-491d-90ff-53f6f39cecf6/zWCyJSuU4Z.lottie"
                  style="width: 300px;height: 300px" speed="1" autoplay loop></dotlottie-wc></div>
                  `);

                        setTimeout(function() {
                            window.location.href =
                                "/dashboard"; // Laravel route to dashboard
                        },5000);


                    },
                    error: function(xhr) {
                        console.error("Order failed:", xhr.responseText);
                    }

                });

            });




            // All subtotal calculate
            function calculate() {
                let TotalSub = 0;

                $('tr').each(function(index, row) {
                    TotalSub += parseInt(($(row).find('#SubPrice').text().replace(/,/g, "")), 10);
                });

                let Tax = TotalSub + 10;
                Tax = Tax.toFixed(2);
                Tax = Tax.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                console.log(Tax)

                TotalSub = TotalSub.toFixed(2);
                TotalSub = TotalSub.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                console.log(TotalSub);

                $('#subTotal').text(TotalSub);
                $('#totalAmount').text(Tax);
            }



        });
    </script>
@endsection

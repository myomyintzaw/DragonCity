@extends('admin.admin-layout')

@section('title', 'Order Detail')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Order Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Order</li>
                    <li class="breadcrumb-item action">Order List</li>
                    <li class="breadcrumb-item action">Order Detail</li>
                </ol>
            </nav>
        </div>


        <!-- Order List -->
        @foreach ($data as $orderDetail)

            <div class="card mx-auto col-xl-4 col-lg-4 col-md-6 col-sm-8 p-3">
                <!-- Order Image -->
                @if ($orderDetail->product_image == null)
                    <div class="m-3 text-center">
                        <img src="{{ asset('images/noimage.png') }}" alt="noimage" width="250" height="250"
                            class="rounded img-thumbnail">
                    </div>
                @else
                    <div class="m-3 text-center">
                        <img src="{{ asset('storage/products/' . $orderDetail->product_image) }}" alt="product image" width="350"
                            class="rounded img-thumbnail">
                    </div>
                @endif
                <!-- End Product Image -->



            <div class="card-body">
                <h5 class="card-title text-center"><i class="fa-solid fa-laptop me-2"></i>{{ $orderDetail->product_name }}</h5>
             </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fa-solid fa-hand-holding-dollar  me-2"></i>{{ $orderDetail->product_price}}
                </li>
                <li class="list-group-item"><i class="fa-solid fa-cubes-stacked  me-2"></i>{{ $orderDetail->qty }} Quantity</li>
                <li class="list-group-item">
                   <i class="fa-solid fa-gem me-2"></i>{{ $orderDetail->total }} Total
                </li>

                <li class="list-group-item"><i
                    class="fa-regular fa-calendar  me-2"></i>{{ $orderDetail->created_at->format('j / F / Y') }}
                 </li>

                </ul>

            </div>

        @endforeach
        <!--End Order List -->
    </main>
@endsection

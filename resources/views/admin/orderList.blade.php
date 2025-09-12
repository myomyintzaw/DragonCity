@extends('admin.admin-layout')

@section('title', 'Order List')

@section('content')

    {{-- {{dd($data->toArray())}} --}}

    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Order List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Order</li>
                    <li class="breadcrumb-item action">Order List</li>
                </ol>
            </nav>
        </div>

        <!-- Order Create Success Message -->
        <div class="col-lg-6 offset-lg-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- {{dd(count($data))}} --}}
        @if (count($data) == 0)
            <h4 class="text-center mt-4 animate__animated animate__bounce animate__flip font-bold">There is no <span
                    class="text-danger">Order Data!</span></h4>
        @else
            <!--Search Bar-->
            <form action="{{ route('order.search') }}" method="GET"
                class="form-inline my-2 my-lg-0 col-11 col-sm-4 com-md-4 col-lg-5 col-xl-5 col-xxl-4 d-lg-flex  ">
                <input class="form-control mr-sm-2 me-2" name="search" type="search" id="search"
                    value="{{ isset($search) ? $search : '' }}" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 mt-2 mt-sm-2 mt-md-2 mt-lg-0 " type="submit"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <!-- End Search Bar -->



            <!--product List -->
            <div class="container-fluid mt-5">
                <table class="table table-responsive table-hover align-middle">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Id</th>
                            <th>Order Name</th>
                            <th>User Name</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $order)
                            <tr>
                                <td class="col-lg-2 text-center ">

                                    <!--Check Delivery-->
                                    {{-- input-group d-flex align-items-center justify-content-center gap-3 --}}
                                    @if ($order->order_delivered == 0)
                                        <a href="{{ route('order.deliver', $order->order_number) }}">
                                            <button class="btn btn-warning  btn-sm my-2 me-2  " title="delivery"><i
                                                    class="fa-solid fa-person-biking"></i></i> Deliver</button>
                                        </a>
                                    @endif
                                    <!--End Check Delivery-->
                                </td>
                                <td >
                                    @if ($order->order_delivered != 0)
                                        <a href="{{ route('deliver.back', $order->order_number) }}">
                                            <button class="btn btn-sm my-2 me-2" title="delivery" style="background-color:rgb(241, 78, 33);">
                                                <i class="fa-solid fa-rotate-left fa-lg text-white"></i></button>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('order.detail', $order->order_number) }}"><button
                                            class="btn btn-sm fw-bolder " title="detail order">
                                            <h5>

                                                {{-- <i class="fa-solid fa-asterisk"></i> --}}
                                                {{-- <i class="fa-solid fa-asterisk fa-fade"></i> --}}
                                                {{-- <i class="fa-solid fa-info fa-fade"></i> --}}
                                                {{-- <i class="fa-sharp fa-solid fa-info"></i> --}}
                                                {{-- <i class="fa-sharp fa-solid fa-info fa-xs"></i> --}}
                                                <i class="fa-solid fa-circle-info text-info me-4"></i>
                                                {{-- <i class="fa-light fa-asterisk"></i> --}}
                                                {{-- <i class="fa-light fa-asterisk fa-fade"></i> --}}
                                                {{-- <i class="fa-solid fa-asterisk fa-fade" style="color: #63E6BE;"></i> --}}
                                            </h5>
                                        </button></a>
                                </td>


                                <td class="col-lg-1">
                                    <a href="{{ route('order.detail', $order->order_number) }}" title="detail order"
                                        class="btn-link">
                                        <h6>{{ $order->id }}</h6>
                                    </a>
                                </td>

                                <td class="col-lg-2 ">
                                    <i class="fa-solid fa-barcode me-2"></i>{{ $order->order_number }}
                                </td>

                                <td class="col-lg-2">
                                    <div class="input-group d-flex align-items-center justify-content-start gap-1">
                                        <i class="fa-duotone fa-solid fa-user me-2"></i>{{ $order->user_name }}
                                    </div>
                                </td>

                                <td class="col-lg-2">
                                    {{-- <i class="fa-solid fa-sack-dollar me-2"></i></i> --}}
                                    <i class="fa-solid fa-circle-dollar-to-slot fa-lg me-2"></i>
                                    {{ $order->total_amount }}
                                </td>
                                {{-- <td class="col-lg-1">{{$order->created_at->format('j-F-Y')}}</td> --}}
                                <td class="col-lg-3"><i
                                        class="fa-solid fa-calendar-days text-success me-2"></i>{{ $order->created_at->format('j / F / Y') }}
                                </td>

                                <!--Check Delivery-->
                                @if ($order->order_delivered != 0)
                                    <td class="col-lg-1">
                                        <a href="{{ route('order.delete', $order->order_number) }}">
                                            <button class="btn btn-danger" title="delete order">
                                                {{-- <i class="fa-solid fa-trash"></i> --}}
                                                <i class="fa-solid fa-delete-left"></i>
                                            </button></a>
                                    </td>
                                @endif
                                <!--End Check Delivery-->

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="mt-5">
                    {{-- {{ $data->links() }} --}}
                    {{ $data->appends(['search' => request('search')])->links() }}

                </div>
            </div>
        @endif


    </main>
@endsection

@extends('admin.admin-layout')

@section('title', 'Product Detail')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Product Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Product</li>
                    <li class="breadcrumb-item action">Product List</li>
                    <li class="breadcrumb-item action">Product Detail</li>
                </ol>
            </nav>
        </div>

        <!-- Product Detail Card -->
        {{-- <div class="container-fluid">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center"> Product Detail</h4>
                        </div>
                        <hr>                         --}}

        <div class="card mx-auto col-xl-4 col-lg-4 col-md-6 col-sm-8 p-3">
            <!-- Product Image -->
            @if ($data->image == null)
                <div class="m-3 text-center">
                    <img src="{{ asset('images/noimage.png') }}" alt="noimage" width="250" height="250"
                        class="rounded img-thumbnail">
                </div>
            @else
                <div class="m-3 text-center">
                    <img src="{{ asset('storage/products/' . $data->image) }}" alt="product image" width="350"
                        class="rounded img-thumbnail">
                </div>
            @endif
            <!-- End Product Image -->


            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title text-center"><i class="fa-solid fa-laptop me-2"></i>{{ $data->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-solid fa-tags text-secondary me-2"></i>{{ $data->series }}</li>
                <li class="list-group-item"><i
                        class="fa-solid fa-layer-group text-secondary me-2"></i>{{ $data->category_name }}</li>
                <li class="list-group-item">{{ $data->description }}</li>
                <li class="list-group-item"><i
                        class="fa-solid fa-hand-holding-dollar text-secondary me-2"></i>{{ $data->price }}</li>
                <li class="list-group-item"><i
                        class="fa-regular fa-calendar text-secondary me-2"></i>{{ $data->created_at->format('j / F / Y') }}
                </li>

            </ul>

        </div>


    </main>
@endsection

@extends('admin.admin-layout')

@section('title', 'Product List')

@section('content')

    {{-- {{dd($data->toArray())}} --}}

    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Product List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Product</li>
                    <li class="breadcrumb-item action">Product List</li>
                </ol>
            </nav>
        </div>

        <!-- Product Create Success Message -->
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
            <h4 class="text-center mt-4 font-bold">There is no <span class="text-danger">Product Data!</span></h4>
        @else
            <!--product List -->
            <div class="container-fluid mt-5">
                <table class="table table-responsive table-hover align-middle ">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Created Date</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $product)
                            <tr>
                                <td class="col-lg-1 text-end ">
                                    <a href="{{route('product.edit',$product->id)}}">
                                        <button class="btn btn-warning" title="edit product"><i
                                                class="fa-regular fa-pen-to-square "></i></button></a>
                                </td>
                                <td class="col-lg-1">
                                    <a href="{{ route('product.detail', $product->id) }}"><button
                                            class="btn btn-outline-info" title="detail product"><i
                                                class="fa-solid fa-circle-info"></i></button></a>
                                </td>

                                <td class="col-lg-1"><a href="{{ route('product.detail', $product->id) }}" title="detail"
                                        class="  fw-bolder btn-link ">
                                        <h5>{{ $product->id }}</h5>
                                    </a></td>
                             <td class="col-lg-2"><i class="fa-solid fa-box-open text-success me-1"></i>{{ $product->name }}</td>
                                <td class="col-lg-2"><i class="fa-solid fa-layer-group text-success me-2"></i>{{ $product->category_name }}</td>
                                {{-- <td class="col-lg-1">{{$product->created_at->format('j-F-Y')}}</td> --}}
                                <td class="col-lg-3"><i class="fa-solid fa-calendar-days text-success me-2"></i>{{ $product->created_at->format('j / F / Y') }}</td>

                                <td class="col-lg-1">
                                    <a href="{{route('product.delete',$product->id)}}">
                                        <button class="btn btn-danger" title="delete product">
                                            {{-- <i class="fa-solid fa-trash"></i> --}}
                                            <i class="fa-solid fa-delete-left"></i>
                                        </button></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="mt-5">
                    {{ $data->links() }}
                </div>
            </div>
        @endif


    </main>
@endsection

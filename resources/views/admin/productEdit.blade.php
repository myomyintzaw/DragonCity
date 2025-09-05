@extends('admin.admin-layout')

@section('title', 'Product Edit Page')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Product Edit</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Product</li>
                    <li class="breadcrumb-item action">Product List</li>
                    <li class="breadcrumb-item action">Product Edit</li>
                </ol>
            </nav>
        </div>

        <!-- Product update Success Message -->
        <div class="col-lg-6 offset-lg-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <!--End Product Create Success Message -->



        <!-- Product Create Card -->
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Product Edit</h4>
                        </div>

                        <!-- Product Image -->
                        @if ($productData->image == null)
                            <div class="m-3 text-center">
                                <img src="{{ asset('images/noimage.png') }}" alt="noimage" width="250" height="250"
                                    class="rounded img-thumbnail">
                            </div>
                        @else
                            <div class="m-3 text-center">
                                <img src="{{ asset('storage/products/' . $productData->image) }}" alt="product image"
                                    width="350" class="rounded img-thumbnail">
                            </div>
                        @endif
                        <!-- End Product Image -->


                        <!-- Product Form-->
                        <form action="{{route('product.update',$productData->id)}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <!-- Product Image -->
                            <div class="form-group mb-4">
                                <label for="productImage" class="form-label">Image</label>
                                <input type="file" name="productImage" id="productImage"
                                    class="form-control @error('productImage') is-invalid @enderror">

                                @error('productImage')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Product Name -->
                            <div class="form-group mb-4">
                                <label for="productName" class="form-label">Name</label>
                                <input type="text" name="productName" id="productName"
                                    class="form-control @error('productName') is-invalid @enderror"
                                    placeholder="Product name" value="{{ old('productName',$productData->name) }}">

                                @error('productName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Product Series -->
                            <div class="form-group mb-4">
                                <label for="productSeries" class="form-label">Series</label>
                                <input type="text" name="productSeries" id="productSeries"
                                    class="form-control @error('productSeries') is-invalid @enderror"
                                    placeholder="Product series" value="{{ old('productSeries',$productData->series) }}">

                                @error('productSeries')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Category -->
                            <div class="form-group mb-4">
                                <label for="category" class="form-label">Category</label>
                                <select name="categoryId" id="category"
                                    class="form-select @error('categoryId') is-invalid @enderror"
                                    aria-label="Default select">
                                    <option value="">Choose category...</option>
                                    @foreach ($categoryData as $category)
                                        <option value="{{ $category->id }}" @if(old('categoryId',$productData->category_id) == $category->id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('categoryId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Product Description -->
                            <div class="form-group mb-4">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea name="productDescription" id="productDescription"
                                    class="form-control @error('productDescription') is-invalid @enderror" placeholder="Product description">{{ old('productDescription',$productData->description) }}</textarea>
                                @error('productDescription')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Product Price -->
                            <div class="form-group mb-4">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" name="productPrice" id="productPrice"
                                    class="form-control @error('productPrice') is-invalid @enderror"
                                    placeholder="Product price" value="{{ old('productPrice',$productData->price) }}">

                                @error('productPrice')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <!-- Button -->
                            <div class="text-center">
                                <input type="submit" value="update" class="btn btn-info fw-bolder text-white px-3">
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>







    </main>


@endsection

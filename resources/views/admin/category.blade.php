@extends('admin.admin-layout')

@section('title', 'Category Page')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Category Create</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Category</li>
                    <li class="breadcrumb-item action">Create Category</li>
                </ol>
            </nav>
        </div>

        <!-- Category Create Success Message -->
        <div class="col-lg-6 offset-lg-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <!--End Category Create Success Message -->



        <!-- Category Create Card -->
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center"> Create New Category</h4>
                        </div>
                        <hr>

                        <!-- Category Form-->
                        <form action="{{ route('category.create') }}" method="post">
                            @csrf

                            <!-- Category Name -->
                            <div class="form-group mb-3">
                                <input type="text" name="categoryName"
                                    class="form-control @error('categoryName') is-invalid @enderror"
                                    placeholder="Category name" value="{{ old('categoryName') }}">

                                @error('categoryName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Category Description form-floating -->
                            <div class=" mb-3 ">
                                <textarea name="categoryDescription" id="categoryDescription" class="form-control" style="height: auto"
                                    placeholder="Category description">{{ old('categoryDescription') }}</textarea>
                                {{-- <label for="categoryDescription">Description</label> --}}
                                @error('categoryDescription')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <!--End Category Description -->

                            <!-- Button -->
                            <div class="text-center">
                                <input type="submit" value="create" class="btn btn-info text-white px-3">
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>



    </main>


@endsection

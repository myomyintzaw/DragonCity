@extends('admin.admin-layout')

@section('title', 'Category Edit Page')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Category Edit</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Category</li>
                    <li class="breadcrumb-item action">Category List</li>
                    <li class="breadcrumb-item action">Edit Category</li>
                </ol>
            </nav>
        </div>



        <!-- Category Create Card -->
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center"> Edit Category</h4>
                        </div>
                        <hr>

                        <!-- Category Form-->
                        <form action="{{route('category.update',$cdata->id)}}" method="post">
                            @csrf

                            <!-- Category Name -->
                            <div class="form-group mb-3">
                                <input type="text" name="categoryName"
                                    class="form-control @error('categoryName') is-invalid @enderror"
                                    value="{{old('categoryName',$cdata->name)}}">

                                @error('categoryName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Category Description form-floating-->
                            <div class=" mb-4 form-group ">
                                <textarea name="categoryDescription"  id="categoryDescription" cols="30" rows="3" class="form-control @error('categoryDescription') is-invalid @enderror">{{old('categoryDescription', $cdata->description)}}</textarea>
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
                                <input type="submit" value="update" class="btn btn-warning text-white px-3 fw-bold">
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>



    </main>


@endsection

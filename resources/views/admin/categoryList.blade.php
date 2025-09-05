@extends('admin.admin-layout')

@section('title', 'Category List')

@section('content')

    {{-- {{dd($data->toArray())}} --}}

    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Category List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Hame</li>
                    <li class="breadcrumb-item action">Category</li>
                    <li class="breadcrumb-item action">Category List</li>
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

        {{-- {{dd(count($data))}} --}}
        @if (count($data) == 0)
            <h4 class="text-center mt-4 font-bold">There is no <span class="text-danger">Category Data!</span></h4>
        @else
            <!--Category List -->
            <div class="container-fluid mt-5">
                <table class="table table-responsive ">
                    <thead>
                        <tr>
                            <th> </th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $category)
                            <tr>
                                <td class="col-lg-1 text-center">
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <button class="btn btn-warning me-3" title="edit category"><i
                                                class="fa-regular fa-pen-to-square"></i></button></a>
                                </td>
                                <td class="col-lg-1">{{ $category->id }}</td>
                                <td class="col-lg-1">{{ $category->name }}</td>
                                <td class="col-lg-4">{{ $category->description }}</td>
                                {{-- <td class="col-lg-1">{{$category->created_at->format('j-F-Y')}}</td> --}}
                                <td class="col-lg-1">{{ $category->created_at->format('j / F / Y') }}</td>

                                <td class="col-lg-1 text-center">
                                    <a href="{{route('category.delete',$category->id)}}">
                                        <button class="btn btn-danger" title="delete category"><i
                                                class="fa-solid fa-trash"></i></button></a>
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

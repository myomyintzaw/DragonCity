@extends('admin.admin-layout')

@section('title', 'Admin Detail')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Admin Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Account</li>
                    <li class="breadcrumb-item action">Admin List</li>
                    <li class="breadcrumb-item action">Admin Detail</li>
                </ol>
            </nav>
        </div>

        <!-- Admin Detail Card -->
        <div class="card mx-auto col-xl-4 col-lg-4 col-md-6 col-sm-8 p-3">
            <!-- Product Image -->
            @if ($admin->image == null)
                <div class="m-3 text-center">
                    <img src="{{ asset('images/noimage.png') }}" alt="noimage" width="250" height="250"
                        class="rounded img-thumbnail">
                </div>
            @else
                <div class="m-3 text-center">
                    <img src="{{ asset('storage/profile/' . $admin->image) }}" alt="product image" width="300"
                        class="rounded img-thumbnail">
                </div>
            @endif
            <!-- End Product Image -->


            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title text-center"><i class="fa-solid fa-user me-2"></i>{{ $admin->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-solid fa-universal-access me-2"></i>{{ $admin->age }}</li>
                <li class="list-group-item"><i class="fa-solid fa-venus-mars me-2"></i>{{ $admin->gender }}</li>
                <li class="list-group-item">
                    {{-- <i class="fa-solid fa-envelope-open-text me-2"></i> --}}
                    {{-- <i class="fa-solid fa-square-envelope me-2"></i> --}}
                    <i class="fa-solid fa-at me-2"></i>
                    {{ $admin->email }}
                </li>
                <li class="list-group-item">
                    {{-- <i class="fa-solid fa-mobile me-2"></i> --}}
                    <i class="fa-solid fa-mobile-screen-button me-2"></i>
                    {{ $admin->phone }}
                </li>
                <li class="list-group-item"><i class="fa-solid fa-street-view me-2"></i>{{ $admin->address }}</li>


                <!-- Demote as User -->
                @if (Auth::user()->id != $admin->id)
                    <li class="list-group-item text-center">
                        <a href="{{ route('demote', $admin->id) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-person-circle-minus me-2"></i>Cover as
                                User</button>
                        </a>
                    </li>
                @endif


            </ul>

        </div>


    </main>
@endsection

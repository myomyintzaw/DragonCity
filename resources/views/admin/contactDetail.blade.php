@extends('admin.admin-layout')

@section('title', 'Contact Detail')

@section('content')
    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Contact Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Contact</li>
                    <li class="breadcrumb-item action">Contact List</li>>
                    <li class="breadcrumb-item action">Contact Detail</li>
                </ol>
            </nav>
        </div>

        <!-- Contact Detail Card -->
        <div class="card mx-auto col-xl-4 col-lg-4 col-md-6 col-sm-8 p-3">

            <div class="card-body">
                <h5 class="card-title text-center"><i class="fa-solid fa-user me-2"></i>Contact Name{{ $data->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fa-solid fa-at me-2"></i>
                    {{ $data->email }}
                </li>
                <li class="list-group-item">

                    <i class="fa-solid fa-mobile-screen-button me-2"></i>
                    {{ $data->phone }}
                </li>
                <li class="list-group-item"><i class="fa-regular fa-message me-2"></i>{{ $data->message }}</li>
                <li class="list-group-item"><i class="fa-sharp fa-solid fa-calendar-week me-2"></i>{{ $data->created_at->format('j/ F / Y') }}</li>

            </ul>

        </div>


    </main>
@endsection

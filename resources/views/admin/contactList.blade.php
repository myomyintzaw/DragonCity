@extends('admin.admin-layout')

@section('title', 'Contact List')

@section('content')

    {{-- {{dd($data->toArray())}} --}}

    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>Contact List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Contact</li>
                    <li class="breadcrumb-item action">Contact List</li>
                </ol>
            </nav>
        </div>

        <!-- Contact Create Success Message -->
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
            <h4 class="text-center mt-4 font-bold">There is no <span class="text-danger">Contact Data!</span></h4>
        @else
            <!--Contact List -->
            <div class="container-fluid mt-5">
                <table class="table table-responsive table-hover align-middle ">
                    <thead>
                        <tr>
                            <th></th>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $contact)
                            <tr>

                                <td class="col-lg-1">
                                    <a href="{{ route('contact.detail', $contact->id) }}"><button
                                            class="btn btn-outline-info" title="Detail Contact"><i
                                                class="fa-solid fa-circle-info"></i></button></a>
                                </td>

                                <td class="col-lg-1"><a href="{{ route('contact.detail', $contact->id) }}" title="Detail"
                                        class="  fw-bolder btn-link ">
                                        <h5>{{ $contact->id }}</h5>
                                    </a></td>
                                <td class="col-lg-2">
                                    <i class="fa-solid fa-user me-2"></i>{{ $contact->name }}</td>
                                <td class="col-lg-3">
                                 <i class="fa-solid fa-envelope-circle-check me-2"></i>{{ $contact->email }}
                                </td>

                                <td class="col-lg-3 ">
                                <i class="fa-slab fa-regular fa-calendar me-2"></i>{{ $contact->created_at->format('j / F / Y') }}
                                </td>

                                <td class="col-lg-1">
                                    <a href="{{ route('contact.delete', $contact->id) }}">
                                        <button class="btn btn-danger" title="delete contact">
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

@extends('admin.admin-layout')

@section('title', 'User List')

@section('content')

    {{-- {{dd($data->toArray())}} --}}

    <main id="main" class="main">
        <!-- Page Title -->
        <div class="pagetitle">
            <h1>User List - {{ $data->total() }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item action">Home</li>
                    <li class="breadcrumb-item action">Account</li>
                    <li class="breadcrumb-item action">User List</li>
                </ol>
            </nav>
        </div>

        <!-- User Create Success Message -->
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
            <h4 class="text-center mt-4 font-bold">There is no <span class="text-danger">User Data!</span></h4>
        @else
            <!--User List -->
            <div class="container-fluid mt-5">
                <table class="table table-responsive table-hover align-middle ">
                    <thead>
                        <tr>
                            <th></th>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $user)
                            <tr>

                                <td class="col-lg-1">
                                    <a href="{{route('user.detail',$user->id)}}"><button class="btn btn-outline-info" title="detail user account"><i
                                                class="fa-solid fa-circle-info"></i></button></a>
                                </td>

                                <td class="col-lg-1"><a href="{{route('user.detail',$user->id)}}" title="detail" class="  fw-bolder btn-link ">
                                        <h5>{{ $user->id }}</h5>
                                    </a></td>
                                <td class="col-lg-2">
                                    <div class="input-group d-flex align-items-center justify-content-start gap-1">
                                        <i class="fa-solid fa-user me-2"></i>{{ $user->name }}
                                    </div>
                                </td>
                                <td class="col-lg-2">
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    {{-- <i class="fa-solid fa-at me-2"></i> --}}
                                    {{ $user->email }}
                                </td>

                                <td class="col-lg-3"><i
                                        class="fa-solid fa-calendar-days text-success me-2"></i>{{ $user->created_at->format('j / F / Y') }}
                                </td>

                                <td class="col-lg-1">
                                    <a href="{{route('user.delete',$user->id)}}">
                                        <button class="btn btn-danger" title="delete user account">
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

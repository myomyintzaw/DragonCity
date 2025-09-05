<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/bootstrap-5.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <title>Login Page</title>
</head>

<body style="background-color: #f6f6f6">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center m-3" role="alert">
            <i class="fa-solid fa-square-check me-2"></i> <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Logo & Heading --}}
    <div class="text-center my-3">
        <img class="inline-block" src="{{ asset('images/logo.png') }}" alt="logo" width="80" height="80">
        <h1 class="text-danger fs-5 mt-2">Account Login...</h1>
    </div>


    {{-- Login Form --}}
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 com-lg-5 col-xl-5">
                {{-- style="background-color: #f6f6f6" --}}
                <section class="mx-aut p-5 rounded bg-white ">
                    <form action="{{ route('login') }}" method="post">
                        @csrf


                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row justify-content-evenly">
                            <div class="col-9">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class=" col-auto">
                                <input type="submit" class="btn btn-danger px-3" value="login">
                            </div>


                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>

</body>
<script src="/bootstrap-5.3.7-dist/js/bootstrap.js"></script>

</html>






{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

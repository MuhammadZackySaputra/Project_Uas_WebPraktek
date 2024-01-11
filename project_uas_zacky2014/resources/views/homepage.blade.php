<!-- resources/views/homepage.blade.php -->

@extends('layout.template')

@section('title', 'Homepage')

@section('content')

<div class="bg-image" style="background-image: url('/images/latte.jpeg'); height: 100vh;">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-center">
        <img src="/images/mocha.jpeg" alt="CoffeShop" class="img-fluid rounded-circle mb-3" style="max-width: 300px;">
        <h1 class="text-white">CoffeShop</h1>
        <p class="text-white mb-4">Since 2024</p>

        @auth
            <!-- Button for Logout -->
            <form method="POST" action="/logout" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @else
            <!-- Button for Login -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
            </button>
        @endauth

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Include your login form here -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.auth')

@section('main')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="{{ route('auth.register') }}" method="POST" class="w-50">
            @csrf
            <h1 class="text-center my-2">Register</h1>
            <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername" name="username">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <p class="form-text">
                    <a href="{{ route('auth.signin') }}">Already have an account?</a>
                </p>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection

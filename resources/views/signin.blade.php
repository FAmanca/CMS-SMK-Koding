@extends('layouts.auth')

@section('main')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="{{ route('auth.login') }}" method="POST" class="w-50">
            <h1 class="text-center my-2">Login</h1>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <p class="form-text">
                    <a href="{{ route('auth.signup') }}">Doesn't have an account?</a>
                </p>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
@endsection

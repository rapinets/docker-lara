@extends('layout')

@section('title', 'Login')

@section('content')

<h5 class="card-header mb-5">Login</h5>

<form class="w-50 mx-auto" method="POST" action="{{ route('login.process') }}">
    @csrf

    <div class="row mb-4">
        <div class="col">
            <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" placeholder="Email" aria-label="Email">
            @error('email')
                <div class="alert">the user does not exist with this email and password</div>
            @enderror
        </div>
        <div class="col">
            <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" placeholder="Password" aria-label="Password">
            @error('password')
                <div class="alert">the user does not exist with this email and password</div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <a href="{{ route('forgot') }}" class="link-primary">Forgot your password?</a>
        </div>
    </div>

    <button type="submit" class="btn btn-dark">Login</button>
</form>

@endsection
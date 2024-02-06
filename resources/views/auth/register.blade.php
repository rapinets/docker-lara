@extends('layout')

@section('title', 'Register')

@section('content')

<h5 class="card-header mb-5">Register</h5>

<form class="w-50 mx-auto" method="POST" action="{{ route('register.process') }}">
    @csrf

    <div class="mb-3">
        <input type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" placeholder="Name" aria-label="Name">
        @error('name')
            <div class="alert">Fill in the field</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" placeholder="Email" aria-label="Email">
        @error('email')
            <div class="alert">Incorrect email address</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="email" class="@error('email_confirmation') is-invalid @enderror form-control" id="email_confirmation" name="email_confirmation" placeholder="Email confirmation" aria-label="Email confirmation">
        @error('email_confirmation')
            <div class="alert">email addresses do not match</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" class="@error('home_page') is-invalid @enderror form-control" id="home_page" name="home_page" placeholder="Home page" aria-label="Home page">
        @error('home_page')
            <div class="alert">Fill in the field</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="password" class="@error('password') is-invalid @enderror form-control" id="password" name="password" placeholder="Password" aria-label="Password">
        @error('password')
            <div class="alert">the password must consist of a min:4 and max:10 characters</div>
        @enderror
    </div>

    <div class="mb-3">
        <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" aria-label="Password confirmation">
        @error('password_confirmation')
            <div class="alert">passwords do not match</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-dark mt-4">Save</button>
</form>



@endsection
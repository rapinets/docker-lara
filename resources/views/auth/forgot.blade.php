@extends('layout')

@section('title', Forgot)

@section('content')

<h5 class="card-header mb-5">Forgot</h5>

<form class="w-50 mx-auto" method="POST" action="{{ route('forgot.process') }}">
    @csrf

    <div class="row mb-4">
        <div class="col">
            <input type="email" class="@error('email') is-invalid @enderror form-control" id="email" name="email" placeholder="Email" aria-label="Email">
            @error('email')
                <div class="alert">the user does not exist with this email and password</div>
            @enderror
        </div>

    <div class="row mb-4">
        <div class="col">
            <a href="{{ route('login') }}" class="link-primary">I remembered the password</a>
        </div>
    </div>

    <button type="submit" class="btn btn-dark mt-4">Restore</button>
</form>

@endsection
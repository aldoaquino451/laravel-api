@extends('layouts.guest')

@section('content')
    <h2 class="my-2">Home Pubblica</h2>
    <p class="mt-4">Per accedere alla dashboard:</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <p class="mt-4">Non sei ancora registrato?</p>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
@endsection

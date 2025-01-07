@extends('layouts.app')

@section('content')
<div class="container text-center" style="padding: 50px 0;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Logo Section -->
            <img src="{{ asset('img/alg.png') }}" alt="App Logo" 
                 style="max-width: 150px; margin-bottom: 20px;">

            <!-- Heading Section -->
            <h1 class="mb-4" 
                style="color: var(--text-color); font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 3rem; text-transform: uppercase;">
                Simplifying Problem Resolution, One Ticket at a Time.
            </h1>

            <!-- Subtext Section -->
            <p class="mb-4" 
                style="color: var(--secondary-color); font-family: 'Roboto', sans-serif; font-size: 1.25rem; font-weight: 500;">
                Easily create and manage your tickets.
            </p>

            <!-- Button Section -->
            <a href="{{ route('tickets.create') }}" class="btn btn-lg" 
                style="background-color: var(--primary-color); color: var(--text-color); font-family: 'Roboto', sans-serif; font-weight: bold; padding: 0.75rem 2rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;">
                Submit a Ticket
            </a>
        </div>
    </div>
</div>
@endsection

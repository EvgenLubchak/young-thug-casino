@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal mb-4">Young Thug Casino</h1>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">
                        <button class="w-100 btn btn-lg btn-primary mb-4" type="button">Dashboard</button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <button class="w-100 btn btn-lg btn-primary mb-4" type="button">Log In</button>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button class="w-100 btn btn-lg btn-primary mb-4" type="button">Register</button>
                        </a>
                    @endif
                @endauth
            </div>
    @endif
@endsection

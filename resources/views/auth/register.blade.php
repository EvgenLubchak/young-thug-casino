@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Young Thug Casino</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" placeholder="John" name="name" min="2" max="255"
                   required/>
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                   required/>
            <label for="floatingInput">Email Address</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPhone" placeholder="420-420-420" name="phone" min="5"
                   max="255" required/>
            <label for="floatingPhone">Phone</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                   required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPasswordConfirmation" placeholder="Confirmation"
                   name="password_confirmation" required>
            <label for="floatingPasswordConfirmation">Password Confirmation</label>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
@endsection

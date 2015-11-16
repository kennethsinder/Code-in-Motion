<!-- resources/views/auth/login.blade.php -->

@extends('layouts.master')

@section('content')

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <div class="container">
        <form class="form-signin">
            <h2 class="form-signin-heading">Please Sign In</h2>
            <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="inputEmail"
                       class="form-control" placeholder="Email address" required autofocus>

            <br/>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" class="form-control" placeholder="Password"
                   name="password" id="password" required>

            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember Me</label>
            </div>

            <div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
</form>

@stop
<!-- resources/views/auth/register.blade.php -->

@extends('layouts.master')

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    <div class="container">
    <div style="width: 100px;">
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div style="width: 100px;">
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div style="width: 100px;">
        Password
        <input type="password" name="password">
    </div>

    <div style="width: 150px;">
        Confirm Password
        <input type="password" name="password_confirmation">
    </div><br/>

    <div style="width: 100px;">
        <button type="submit">Register</button>
    </div>
    </div>
</form>
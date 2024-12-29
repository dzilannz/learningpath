@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-left">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <h2>Student <br>Learning Path</h2>
        <p>Where has your progress been?</p>
    </div>
    <div class="login-right">
        <h3>Welcome!</h3>
        <form action="{{ route('login') }}" method="POST">
        @csrf
            <input type="text" name="identifier" placeholder="NIM/NIP">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #F9F9F9;
    }

    .login-container {
        display: flex;
        width: 800px;
        height: 450px;
        background-color: #FFFFFF;
        border-radius: 15px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .login-left {
        flex: 1;
        background-color: #FFD523;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .login-left img {
        width: 160px;
        margin-bottom: 10px;
    }

    .login-left h2 {
        font-size: 24px;
        font-weight: bold;
        color: #000;
        margin-bottom: 10px;
        text-align: center;
    }

    .login-left p {
        font-size: 16px;
        color: #000;
        text-align: center;
        margin-top: 10px;
        font-style: italic;
    }

    .login-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .login-right h3 {
        font-weight: 600;
        font-size: 28px;
        color: #333;
        margin-bottom: 30px;
    }

    .login-right input {
        width: 100%;
        height: 50px;
        margin-bottom: 20px;
        border: 1px solid #FFD523;
        border-radius: 10px;
        padding: 0 15px;
        font-size: 16px;
        outline: none;
    }

    .login-right button {
        width: 100%;
        height: 50px;
        background-color: #FFD523;
        color: #FFFFFF;
        border: none;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .login-right button:hover {
        background-color: #FFC107;
    }
</style>
@endpush

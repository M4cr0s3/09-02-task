@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('login')]) name="login"
                       id="login">
                @error('login')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password"
                       @class(['form-control', 'is-invalid' => $errors->has('password')]) name="password"
                       id="password">
                @error('password')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Авторизоваться</button>
        </form>
    </div>
@endsection

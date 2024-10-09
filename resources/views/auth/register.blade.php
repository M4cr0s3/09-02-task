@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="firstname" class="form-label">Имя</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('firstname')]) name="firstname"
                       id="firstname">
                @error('firstname')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Фамилия</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('lastname')]) name="lastname"
                       id="lastname">
                @error('lastname')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="patronymic" class="form-label">Отчество</label>
                <input type="text"
                       @class(['form-control', 'is-invalid' => $errors->has('patronymic')]) name="patronymic"
                       id="patronymic">
                @error('patronymic')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
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
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) name="email"
                       id="email">
                @error('email')
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
            <div class="mb-3">
                <label for="password_conf" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control" name="password_confirmation"
                       id="password_conf">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" @class(['form-check-input', 'is-invalid' => $errors->has('rules')]) id="rules"
                       name="rules">
                <label class="form-check-label" for="rules">Согласен с правилами регистрации</label>
                @error('rules')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
    </div>
@endsection

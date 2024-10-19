@extends('layouts.app')

@section('title')
    Создание категории
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) name="title"
                       id="title">
                @error('title')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Создать</button>
        </form>
    </div>
@endsection

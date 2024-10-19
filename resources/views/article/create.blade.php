<?php
/** @var \App\Models\Category[] $categories */
/** @var \App\Models\User[] $users */
?>

@extends('layouts.app')

@section('title')
    Создание статьи
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea @class(['form-control', 'is-invalid' => $errors->has('content')]) name="content"
                          id="content"></textarea>
                @error('content')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Категория</label>
                <select @class(['form-select', 'is-invalid' => $errors->has('category_id')]) name="category_id"
                        id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Автор</label>
                <select @class(['form-select', 'is-invalid' => $errors->has('user_id')]) name="user_id"
                        id="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" @class(['form-control', 'is-invalid' => $errors->has('image')]) name="image"
                       id="image">
                @error('image')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="time_to_read" class="form-label">Время на чтение</label>
                <input type="number"
                       @class(['form-control', 'is-invalid' => $errors->has('time_to_read')]) name="time_to_read"
                       id="time_to_read">
                @error('time_to_read')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Создать</button>
        </form>
    </div>
@endsection

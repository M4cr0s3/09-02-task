<?php
/** @var \App\Models\Article $article */
/** @var \App\Models\User $user */
?>

@extends('layouts.app')

@section('title')
    Редактирование статьи {{ $article->title }}
@endsection

@section('content')
    <div class="container mt-5">
        <form
            action="{{ route('articles.update', ['article' => $article]) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input
                    type="text"
                    @class(['form-control', 'is-invalid' => $errors->has('title')])
                    name="title"
                    id="title"
                    value="{{ $article->title }}"
                >
                @error('title')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Содержимое</label>
                <textarea
                    @class(['form-control', 'is-invalid' => $errors->has('content')])
                    name="content"
                    id="content"
                >
                    {{ $article->content }}
                </textarea>
                @error('content')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Категория</label>
                <select
                    @class(['form-select', 'is-invalid' => $errors->has('category_id')])
                    name="category_id"
                    id="category_id"
                >
                    @foreach($categories as $category)
                        <option
                            @selected($article->category_id === $category->id)
                            value="{{ $category->id }}"
                        >
                            {{ $category->title }}
                        </option>
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
                <select
                    @class(['form-select', 'is-invalid' => $errors->has('user_id')])
                    name="user_id"
                    id="user_id"
                >
                    @foreach($users as $user)
                        <option
                            @selected($article->user_id === $user->id)
                            value="{{ $user->id }}">
                            {{ $user->firstname }} {{ $user->lastname }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="d-flex flex-column">
                <span>Текущее изображение:</span>
                <img class="w-50 h-5 mt-2" src="{{ asset($article->image_path) }}" alt="{{ $article->title }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input
                    type="file"
                    @class(['form-control', 'is-invalid' => $errors->has('image')])
                    name="image"
                    id="image"
                >
                @error('image')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="time_to_read" class="form-label">Время на чтение</label>
                <input
                    type="number"
                    @class(['form-control', 'is-invalid' => $errors->has('time_to_read')])
                    name="time_to_read"
                    value="{{ $article->time_to_read }}"
                    id="time_to_read"
                >
                @error('time_to_read')
                <p class="text-danger mt-2">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">Изменить</button>
        </form>
    </div>
@endsection

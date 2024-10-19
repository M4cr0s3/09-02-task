<?php
/** @var \App\Models\Article[] $articles */

/** @var \App\Models\User $user */
$user = Auth::user();
?>

@extends('layouts.app')

@section('title')
    Обзоры
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Обзоры</h1>
            @if($user && $user->isAdmin())
                <div class="">
                    <a class="btn btn-primary" href="{{ route('articles.create') }}">Создать обзор</a>
                </div>
            @endif
        </div>
        <div class="row gap-2">
            @foreach($articles as $article)
                <div class="card mt-3" style="width: 18rem;">
                    <img src="{{ asset($article->image_path) }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <p class="card-text">
                            {{ $article->content }}
                        </p>
                        <p class="card-text"><small class="text-muted">Категория: {{ $article->category->title }}</small></p>
                        <p class="card-text"><small class="text-muted">Время на прочтение: {{ $article->time_to_read }}
                                минут</small></p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary w-100">Подробнее</a>
                        @if($user && ($user->isAdmin() || $user->id === $article->user_id))
                            <a href="{{ route('articles.edit', $article) }}"
                               class="btn btn-success w-100 mt-2">Изменить</a>
                        @endif
                        @if($user && $user->isAdmin())
                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 mt-2">Удалить</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

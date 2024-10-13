<?php
/** @var \App\Models\Category[] $categories */
?>

@extends('layouts.app')

@section('title')
    Категории
@endsection

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Категории</h1>
            <a href="{{ route('categories.create') }}">
                Создать категорию
            </a>
        </div>
        @foreach($categories as $category)
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('categories.show', $category) }}">
                            {{ $category->title }}
                        </a>
                        <div class="d-flex gap-2 align-items-center">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary w-100">
                                Изменить
                            </a>
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

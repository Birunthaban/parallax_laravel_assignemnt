<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Book</h1>

        <form method="post" action="{{ route('books.store') }}">
        @csrf
            @method('POST')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" required>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required>
            @error('stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>

            <button type="submit">Add Book</button>
        </form>
    </div>
@endsection

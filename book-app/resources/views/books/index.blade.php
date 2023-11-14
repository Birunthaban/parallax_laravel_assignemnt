@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('books.create')}}">Add New Book </a>
    <h1>List of Books</h1>

    <table class="table" border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Edit </th>
                <th> Delete </th>

            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <form method="get" action="{{ route('books.edit', ['book' => $book]) }}">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                </td>


                <td>
                    <form method="post" action="{{route('books.destroy',['id'=>$book->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('components.layout')

@section('title', 'Books')
@section('page_class', 'books_page')

@section('content')
    <h3>Create new book</h3>
    <form method="POST" action="books" class="add_form">
        <input type="text" placeholder="title" name="name">
        <input type="text" placeholder="author" name="author">
        <button type="submit">Save book</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>

    <h3>All books</h3>
    <div class="books">
        @foreach ($books as $book)
            <a href="{{ route('books.single', ['id' => $book->id]) }}"
                class="book @if ($book->customer_id != null) not_available @endif">
                {{ $book->name }}
                <div style="font-size: 0.7em;">{{ $book->author }}</div>
            </a>
        @endforeach
    </div>

@endsection

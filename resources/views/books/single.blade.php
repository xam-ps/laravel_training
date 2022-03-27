@extends('components.layout')

@section('title', $book->name)
@section('page_class', 'book_page')

@section('content')
    <h2>{{ $book->name }}</h2>
    <h3>{{ $book->author }}</h3>
    <br>

    @if ($book->customer_id == null)
        <form action="{{ route('customers.checkout', ['bookId' => $book->id]) }}" method="POST" class="book">
            @csrf
            Checkout Book to
            <select name="customer">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                @endforeach
            </select>
            <button type="submit">Checkout</button>
        </form>
    @endif
    

    <br>
    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="POST" class="book" onSubmit="return confirm('Are you sure you want to delete &quot;{{ $book->name }}&quot;?');">
        @method('DELETE')
        @csrf
        <button type="submit">
            <div>Delete Book</div>
        </button>
    </form>

@endsection

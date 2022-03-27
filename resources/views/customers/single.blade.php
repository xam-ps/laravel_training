@extends('components.layout')

@section('title', $customer->full_name)
@section('page_class', 'customer_page')

@section('content')
    <div>
        <h2>
            {{ $customer->full_name }}
        </h2>

        <h3>Booklist</h3>
        <ul>
            @foreach ($books as $book)
                <li>
                    {{ $book->name }}
                    <form action="{{ route('customers.checkin', ['customerId' => $customer->id, 'bookId' => $book->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Return Book</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

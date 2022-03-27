@extends('components.layout')

@section('title', 'Customers')
@section('page_class', 'customers_page')

@section('content')
    <h3>Add new customer</h3>
    <form method="POST" action="customers" class="add_form">
        <input type="text" placeholder="Firstname" name="firstname">
        <input type="text" placeholder="Lastname" name="lastname">
        <button type="submit">Add customer</button>
        @csrf
    </form>

    <h3>Existing customers</h3>
    <ul>
        @foreach ($customers as $customer)
            <a href="{{ route('customers.show', ['id' => $customer->id]) }}">
                <li>
                    {{ $customer->full_name }} >
                </li>
            </a>
            <br>
        @endforeach
    </ul>
@endsection

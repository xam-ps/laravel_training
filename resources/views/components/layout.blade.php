<!DOCTYPE html>
<html lang="de">

<head>
    <title>@yield('title') - Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>

<body class="@yield('page_class')">
    <header>
        <a href="{{ route('books.index') }}">
            <h1>Library</h1>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('customers.index') }}">
                        Customers
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div>
        @yield('content')
    </div>
</body>

</html>

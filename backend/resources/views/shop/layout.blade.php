<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Page</title>
        <!-- css -->
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    </head>
    <body>
    <header>
    
            <h2>@yield('title')</h2>
           
            <ul class="menu">
                <li>ログイン中：{{ Auth::user()->name }} さん</li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">Log out</button>    
                    </form>
                </li>
            </ul>
    </header>
    <main>
        @yield('content')
    </main>
    </body>
</html>
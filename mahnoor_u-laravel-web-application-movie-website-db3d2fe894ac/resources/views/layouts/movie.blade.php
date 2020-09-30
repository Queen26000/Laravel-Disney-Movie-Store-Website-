<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Disney Movie Website</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    </head>
    <body>
        @include('inc.navbar')
        <br>
        <br>
        @include('inc.messages')
        <br>
        @yield('content')
        @include('inc.footer')

    </body>
</html>

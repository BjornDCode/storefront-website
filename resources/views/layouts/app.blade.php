<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Storefront JS</title>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://use.typekit.net/ime7qlg.css">
    </head>
    <body>
        <div id="app">
            @include('partials._header')
            @yield('content')
        </div>

        <script src="https://js.stripe.com/v3/"></script>
        <script src="/js/app.js"></script>
    </body>
</html>

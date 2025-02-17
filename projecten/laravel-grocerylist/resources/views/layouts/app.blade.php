<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boodschrappen - @yield('title')</title>
</head>

<body>
    @include('partials.nav')
    <section id="content">
        @yield('content')
    </section>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptlog - @yield('title')</title>
</head>

<body>
    @include('partials.nav')
    <main>
        <section id="content">
            @yield('content')
        </section>
    </main>
</body>

</html>

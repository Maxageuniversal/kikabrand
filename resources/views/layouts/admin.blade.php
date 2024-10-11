<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Add your CSS file here -->
</head>

<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>

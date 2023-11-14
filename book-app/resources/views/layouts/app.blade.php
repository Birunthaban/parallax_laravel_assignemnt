<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>BOOK APPLICATION</title>
    <!-- Additional head elements go here -->
</head>
<body>
    <div>
        @yield('content')
    </div>
    <!-- Additional scripts or footer elements go here -->
</body>
</html>

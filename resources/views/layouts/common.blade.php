<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script defer src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link defer rel="preconnect" href="https://fonts.googleapis.com" />
    <link defer rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link defer href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('pageTitle', 'Barta')</title>
</head>

<body class="bg-gray-100">
    {{ $slot }}
</body>

</html>

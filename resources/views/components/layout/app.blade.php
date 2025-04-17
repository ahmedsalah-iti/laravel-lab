@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITI-Laravel | {{ strtoupper($title ?? 'HOME') }}</title>
</head>
<body class="min-h-screen flex flex-col dark-bg font-sans transition-all duration-300 w-full md:p-9">
    <!-- Header -->
    @include('components.layout.header')

    <!-- Main Content -->
    {{$slot}}

    <!-- Footer -->
    @include('components.layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Library</title>
</head>

<body>

    <x-public-navbar />

    <main class="pt-[20px] px-[20px]">
        {{ $slot }}
    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minimal Laravel + Vue</title>
    @vite('resources/js/app.js')
</head>
<body>
    @csrf
    @inertia
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</body>
</html>
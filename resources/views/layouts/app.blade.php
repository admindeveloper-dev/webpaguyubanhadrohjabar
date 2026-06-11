<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori Hadroh Jawa Barat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased">
    
    <main class="min-h-screen flex flex-col justify-between">
        <div class="container mx-auto px-4 py-6">
            @yield('content')
        </div>
    </main>

</body>
</html>
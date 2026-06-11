<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori Hadroh Jawa Barat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-emerald-500 selection:text-white">

    @include('layouts.navigation-hadroh')

    <main class="min-h-[calc(100vh-120px)] container mx-auto px-4 py-8 max-w-md md:max-w-4xl lg:max-w-6xl flex items-center justify-center">
        <div class="w-full">
            @yield('content')
        </div>
    </main>

    <footer class="py-4 text-center text-xs text-slate-500 border-t border-slate-900 bg-slate-950">
        <center>
        &copy;  Hadroh Jabar - PAGUYUBAN BARAYA HADROH
</center>
    </footer>

</body>
</html>
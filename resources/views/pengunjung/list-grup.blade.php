<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Grup Hadroh</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between">

    <header class="border-b border-slate-900 bg-slate-950/80 backdrop-blur sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-extrabold tracking-wider bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">
                HADROH JABAR
            </h1>
            <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-400 hover:text-amber-400 transition">
                ← Kembali ke Login
            </a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10 flex-grow w-full">
        <div class="mb-8">
            <h2 class="text-2xl font-bold tracking-tight">Daftar Grup Hadroh Riil</h2>
            <p class="text-slate-400 text-sm mt-1">Pilih grup hadroh terbaik di Jawa Barat untuk meramaikan acara Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($groups->isEmpty())
                <div class="col-span-full text-center py-16 bg-slate-900/40 border border-dashed border-slate-800 rounded-2xl">
                    <p class="text-slate-500 text-sm">Belum ada grup hadroh yang terdaftar di database.</p>
                    <p class="text-amber-500/80 text-xs mt-2">Silakan login sebagai admin untuk menambah data baru.</p>
                </div>
            @else
                @foreach($groups as $group)
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 hover:border-amber-500/40 transition group flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-amber-400 tracking-wider uppercase bg-amber-500/10 px-2 py-0.5 rounded-md border border-amber-500/20">
                                {{ $group->daerah }}
                            </span>
                            <h3 class="text-slate-100 font-bold text-base mt-3 tracking-wide group-hover:text-amber-400 transition">
                                {{ $group->nama_grup }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-1 font-medium">
                                {{ $group->nama_majelis ?? 'Umum / Tanpa Majelis' }}
                            </p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-slate-800/60 flex items-center justify-between">
                            <span class="text-[11px] text-emerald-400 font-medium flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                            </span>
                            <a href="{{ route('pengunjung.detail', $group->id) }}" class="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs px-4 py-2 rounded-xl transition shadow-md shadow-amber-500/5">
                                Kunjungi!
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </main>

    <footer class="border-t border-slate-900 py-6 text-center text-xs text-slate-600">
        &copy; 2026 Hadroh Jabar. All rights reserved.
    </footer>

</body>
</html>
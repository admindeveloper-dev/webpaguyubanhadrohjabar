@extends('layouts.main')

@section('content')
<div class="w-full max-w-md mx-auto">
    
    <div class="mb-5">
        <a href="{{ route('pengunjung.detail', $group->id) }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-amber-400 transition">
            ⬅️ Kembali ke Profil
        </a>
    </div>

    <div class="bg-slate-900 border border-emerald-900/40 rounded-2xl p-6 shadow-xl shadow-black/40">
        <div class="text-center mb-6">
            <span class="text-[10px] font-bold tracking-widest text-amber-400 uppercase bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 rounded-md">Form Pemesanan</span>
            <h2 class="text-slate-100 font-bold text-lg mt-3 tracking-wide">
                Undang {{ $group->nama_grup }}
            </h2>
        </div>

        <form action="{{ route('pengunjung.store-order', $group->id) }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs text-slate-400 font-medium mb-1 pl-1">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" required placeholder="Masukkan nama Anda..." 
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-emerald-600 transition placeholder-slate-600">
            </div>

            <div>
                <label class="block text-xs text-slate-400 font-medium mb-1 pl-1">Daerah / Lokasi Acara</label>
                <input type="text" name="daerah" required placeholder="Contoh: Kec. Cibiru, Bandung" 
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-emerald-600 transition placeholder-slate-600">
            </div>

            <div>
                <label class="block text-xs text-slate-400 font-medium mb-1 pl-1">Acara / Keperluan</label>
                <input type="text" name="acara" required placeholder="Contoh: Walimatul 'Ursy / Pengajian" 
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-emerald-600 transition placeholder-slate-600">
            </div>

            <div>
                <label class="block text-xs text-slate-400 font-medium mb-1 pl-1">Waktu Pelaksanaan</label>
                <input type="datetime-local" name="waktu" required 
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-sm text-slate-100 focus:outline-none focus:border-emerald-600 transition color-scheme-dark">
            </div>

            <button type="submit" 
                class="w-full bg-emerald-700 hover:bg-emerald-600 text-white font-bold text-sm py-3 rounded-xl shadow-lg shadow-emerald-900/20 transition duration-200 mt-4 tracking-wider uppercase flex items-center justify-center gap-2">
                💬 Hubungi WhatsApp
            </button>
        </form>
    </div>

</div>

<style>
    .color-scheme-dark {
        color-scheme: dark;
    }
</style>
@endsection
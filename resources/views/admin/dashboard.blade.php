@extends('layouts.main')

@section('content')
<style>
    .dashboard-page-bg {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: 100vh;
        padding-top: 2rem;
        padding-bottom: 4rem;
    }
    .premium-panel {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #1e293b !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6) !important;
        border-radius: 1.5rem !important;
    }
    .group-row {
        border-bottom: 1px solid rgba(30, 41, 59, 0.5);
        transition: all 0.2s ease-in-out;
    }
    .group-row:hover {
        background-color: rgba(3, 7, 18, 0.4) !important;
        border-left: 4px solid #10b981 !important; /* Aksen garis hijau vertikal saat di-hover */
    }
    .action-btn {
        background-color: #030712 !important;
        border: 1px solid #1f2937 !important;
        transition: all 0.2s;
    }
    .action-btn-edit:hover {
        color: #fbbf24 !important;
        border-color: rgba(251, 191, 36, 0.4) !important;
        background-color: rgba(251, 191, 36, 0.05) !important;
    }
    .action-btn-delete:hover {
        color: #f87171 !important;
        border-color: rgba(248, 113, 113, 0.4) !important;
        background-color: rgba(248, 113, 113, 0.05) !important;
    }
</style>

<div class="dashboard-page-bg w-full px-4">
    <div class="w-full max-w-5xl mx-auto animate-fade-in">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 border-b border-slate-800/80 pb-6">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-extrabold tracking-widest text-emerald-400 uppercase">Panel Kontrol Utama</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-white mt-1 tracking-tight bg-gradient-to-r from-slate-100 to-slate-400 bg-clip-text text-transparent">
                    Dashboard Admin
                </h1>
            </div>
            
            <a href="{{ route('admin.hadroh.create') }}" class="group relative inline-flex items-center justify-center p-0.5 overflow-hidden text-xs font-bold text-white rounded-xl bg-gradient-to-br from-emerald-500 to-teal-700 shadow-lg shadow-emerald-950/40 transition-all duration-300 hover:scale-[1.02] w-full sm:w-auto text-center">
                <span class="relative px-5 py-3 transition-all ease-in duration-75 bg-slate-950 rounded-[10px] group-hover:bg-opacity-0 w-full block">
                    ➕ Tambah Grup Baru
                </span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-gradient-to-r from-emerald-950/80 to-slate-900 border border-emerald-500/30 text-emerald-400 text-xs sm:text-sm px-5 py-4 rounded-xl mb-6 shadow-xl flex items-center gap-3 backdrop-blur-sm">
                <span class="text-base sm:text-lg">🎉</span>
                <span class="font-bold tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        <div class="premium-panel overflow-hidden">
            
            <div class="p-5 bg-black/30 border-b border-slate-800/80 flex justify-between items-center">
                <div class="font-black text-xs text-amber-400 tracking-widest uppercase flex items-center gap-2">
                    📂 Daftar Grup Terdaftar
                </div>
                <span class="text-[10px] font-extrabold text-slate-400 bg-slate-950 px-3 py-1 rounded-full border border-slate-800">
                    Total: {{ $groups->count() }} Grup
                </span>
            </div>

            @if($groups->isEmpty())
                <div class="p-16 text-center text-slate-500 text-xs flex flex-col items-center justify-center gap-3 bg-black/10">
                    <span class="text-4xl opacity-30">📥</span>
                    <p class="font-medium text-slate-400">Belum ada grup hadroh yang terdaftar.</p>
                    <p class="text-[11px] text-slate-600 max-w-xs">Klik tombol "Tambah Grup Baru" di atas untuk mengisi data paguyuban pertama kamu.</p>
                </div>
            @else
                <div class="divide-y divide-slate-800/40 bg-black/5">
                    @foreach($groups as $group)
                        <div class="p-5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 group group-row">
                            
                            <div class="flex items-start gap-4">
                                <div class="w-11 h-11 rounded-xl bg-slate-950 border border-slate-800 flex items-center justify-center text-lg shadow-md group-hover:border-emerald-500/30 group-hover:bg-emerald-950/20 transition-all duration-300">
                                    🕌
                                </div>
                                <div>
                                    <h3 class="font-black text-slate-200 group-hover:text-amber-400 transition duration-200 text-sm sm:text-base tracking-wide">
                                        {{ $group->nama_grup }}
                                    </h3>
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-400 mt-1">
                                        <span class="flex items-center gap-1 font-medium text-slate-400">
                                            📍 {{ $group->daerah }}
                                        </span>
                                        <span class="text-slate-700 hidden sm:inline">•</span>
                                        <span class="flex items-center gap-1 text-emerald-400 font-bold font-mono tracking-wide text-[11px]">
                                            📱 {{ $group->nomor_hp }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4 border-t sm:border-t-0 border-slate-800/40 pt-4 sm:pt-0">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.hadroh.edit', $group->id) }}" 
                                       class="action-btn action-btn-edit px-3 py-2 text-xs font-bold text-slate-400 rounded-lg transition shadow-sm flex items-center gap-1" title="Edit Data">
                                        ✏️ Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.hadroh.delete', $group->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus grup ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="action-btn action-btn-delete px-3 py-2 text-xs font-bold text-slate-400 rounded-lg transition shadow-sm flex items-center gap-1" title="Hapus Data">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>

                                <span class="text-[9px] font-black tracking-widest text-emerald-400 bg-emerald-500/10 px-3 py-1.5 rounded-md border border-emerald-500/20 shadow-sm shadow-emerald-950/40">
                                    ONLINE
                                </span>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
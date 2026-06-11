@extends('layouts.main')

@section('content')
<style>
    .gallery-page-bg {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: 100vh;
        padding-top: 2rem;
        padding-bottom: 4rem;
    }
    .gallery-card {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #1e293b !important;
        box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.6) !important;
        border-radius: 0.75rem !important; /* Radius diperkecil agar serasi dengan card kecil */
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .gallery-card:hover {
        transform: translateY(-4px);
        border-color: #f59e0b !important;
        box-shadow: 0 15px 30px -10px rgba(245, 158, 11, 0.2) !important;
    }
    .img-frame {
        background-color: #030712 !important;
        aspect-ratio: 4 / 3 !important; /* Memaksa rasio foto lanskap rapih seragam */
        width: 100%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="gallery-page-bg w-full px-4">
    <div class="w-full max-w-4xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ route('pengunjung.detail', $group->id) }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-amber-400 transition duration-200">
                ⬅️ Kembali ke Profil {{ $group->nama_grup }}
            </a>
        </div>

        <div class="text-center mb-8">
            <span class="text-[9px] font-extrabold tracking-widest text-amber-400 uppercase bg-amber-400/10 border border-amber-500/20 px-2.5 py-1 rounded-md">
                Dokumentasi Kegiatan
            </span>
            <h2 class="text-white font-black text-xl sm:text-2xl mt-3 tracking-wide">
                Album Foto <span class="text-amber-400">{{ $group->nama_grup }}</span>
            </h2>
            <p class="text-[11px]/relaxed text-slate-400 mt-1.5 max-w-md mx-auto">Koleksi dokumentasi pementasan resmi yang terverifikasi oleh pengurus wilayah.</p>
        </div>

        @if($group->foto && is_array($group->foto) && count($group->foto) > 0)
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                
                @foreach($group->foto as $itemFoto)
                    <div class="gallery-card flex flex-col justify-between">
                        <div class="img-frame border-b border-slate-800/80">
                            <img src="{{ asset($itemFoto) }}" class="w-full h-full object-cover block" alt="Foto Kegiatan">
                        </div>
                        
                        <div class="p-3">
                            <h4 class="text-white font-bold text-xs truncate tracking-wide" title="{{ $group->nama_grup }}">
                                {{ $group->nama_grup }}
                            </h4>
                            <div class="flex flex-col gap-0.5 text-[10px] text-slate-400 mt-2 pt-2 border-t border-slate-800/60">
                                <span class="text-emerald-400 font-medium truncate">
                                    🏛️ {{ $group->nama_majelis ?? 'Umum' }}
                                </span>
                                <span class="font-semibold text-slate-300 truncate">
                                    📍 {{ $group->daerah }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        @else
            <div class="gallery-card p-10 text-center max-w-sm mx-auto">
                <span class="text-5xl block mb-3 opacity-25">🕌</span>
                <h4 class="text-slate-300 font-bold text-xs">Belum Ada Foto Kegiatan</h4>
                <p class="text-[11px] text-slate-500 mt-1.5">Admin grup hadroh ini belum memperbarui album dokumentasi di halaman admin.</p>
                <div class="mt-5">
                    <a href="{{ route('pengunjung.detail', $group->id) }}" class="text-[11px] font-bold text-amber-400 hover:underline">
                        Kembali ke halaman profil
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
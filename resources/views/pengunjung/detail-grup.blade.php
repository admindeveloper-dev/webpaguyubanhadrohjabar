@extends('layouts.main')

@section('content')
<style>
    .visitor-page-bg {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: 100vh;
        padding-top: 1.5rem;
        padding-bottom: 2.5rem;
    }
    .profile-card {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #1e293b !important;
        box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7) !important;
        border-radius: 1.25rem !important;
    }
    .info-row {
        border-bottom: 1px solid rgba(51, 65, 85, 0.4) !important;
    }
</style>

<div class="visitor-page-bg w-full px-4">
    <div class="w-full max-w-2xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ route('pengunjung.list') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-amber-400 transition duration-200">
                ⬅️ Kembali ke List
            </a>
        </div>

        <div class="profile-card p-5 sm:p-6 mb-8">
            <h2 class="text-amber-400 font-extrabold text-base border-b border-slate-800 pb-3 mb-4 tracking-wider uppercase flex items-center gap-2">
                📋 Informasi Umum: <span class="text-white normal-case font-bold">{{ $group->nama_grup }}</span>
            </h2>
            
            <div class="space-y-4 text-sm">
                <div class="flex flex-col sm:flex-row sm:items-center info-row pb-3 gap-1 sm:gap-0">
                    <span class="w-36 text-slate-400 font-medium">Nama Grup</span>
                    <span class="text-slate-100 font-bold">: {{ $group->nama_grup }}</span>
                </div>
                
                <div class="flex flex-col sm:flex-row sm:items-center info-row pb-3 gap-1 sm:gap-0">
                    <span class="w-36 text-slate-400 font-medium">Naungan Majelis</span>
                    <span class="text-emerald-400 font-semibold">: {{ $group->nama_majelis ?? 'Umum / Non-Majelis' }}</span>
                </div>
                
                <div class="flex flex-col sm:flex-row sm:items-center info-row pb-3 gap-1 sm:gap-0">
                    <span class="w-36 text-slate-400 font-medium">Wilayah / Daerah</span>
                    <span class="text-slate-200">: 📍 {{ $group->daerah }}</span>
                </div>
                
                <div class="flex flex-col sm:flex-row sm:items-center pb-1 gap-1 sm:gap-0">
                    <span class="w-36 text-slate-400 font-medium">Kontak HP Admin</span>
                    <span class="text-slate-200 font-mono">: {{ $group->nomor_hp }}</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            
            <a href="{{ route('pengunjung.galeri', $group->id) }}" 
               class="inline-flex items-center justify-center w-full sm:w-1/2 bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-slate-950 font-black text-sm py-4 rounded-xl tracking-widest uppercase shadow-xl transition duration-300 transform hover:-translate-y-0.5 gap-2">
                📸 Lihat Galeri Foto
            </a>

            <a href="https://wa.me/{{ $group->nomor_hp }}?text=Assalamualaikum%20Admin%20{{ urlencode($group->nama_grup) }},%20saya%20tertarik%20untuk%20mengundang%20/%20order%20grup%20hadroh%20Anda%20melalui%20platform%20Paguyuban%20Baraya%20Hadroh%20Jabar." 
               target="_blank"
               class="inline-flex items-center justify-center w-full sm:w-1/2 bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-400 hover:to-green-400 text-slate-950 font-black text-sm py-4 rounded-xl tracking-widest uppercase shadow-xl transition duration-300 transform hover:-translate-y-0.5 gap-2">
                💬 Hubungi Via WhatsApp
            </a>
            
        </div>

    </div>
</div>
@endsection
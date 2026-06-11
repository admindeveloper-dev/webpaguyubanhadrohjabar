@extends('layouts.main')

@section('content')
<style>
    .dark-page-wrapper {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: 100vh;
        padding-top: 2rem;
        padding-bottom: 2rem;
    }
    .premium-card {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #065f46 !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important;
        border-radius: 1rem !important;
    }
    .custom-input {
        background-color: #030712 !important;
        border: 1px solid #1f2937 !important;
        color: #f8fafc !important;
    }
    .custom-input:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2) !important;
    }
</style>

<div class="dark-page-wrapper w-full px-4">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-amber-400 transition duration-200">
                <span>⬅️</span> Kembali ke Dashboard
            </a>
        </div>

        <div class="premium-card relative p-5 sm:p-8 overflow-hidden">
            
            <div class="text-center mb-8 relative z-10">
                <span class="text-[10px] font-extrabold tracking-widest text-amber-400 uppercase bg-amber-400/10 border border-amber-500/20 px-3 py-1 rounded-md">
                    Mode Penyuntingan Multi-Galeri
                </span>
                <h2 class="text-white font-black text-xl sm:text-2xl mt-3 tracking-wide">
                    Edit Profil <span class="text-amber-400">{{ $group->nama_grup }}</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Perbarui data informasi dan unggah banyak dokumentasi foto kegiatan sekaligus</p>
            </div>

            <form action="{{ route('admin.hadroh.update', $group->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs text-slate-400 font-semibold mb-1.5 tracking-wide uppercase">Nama Grup Hadroh</label>
                        <input type="text" name="nama_grup" required value="{{ old('nama_grup', $group->nama_grup) }}" placeholder="Masukkan nama grup..." 
                            class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs text-slate-400 font-semibold mb-1.5 tracking-wide uppercase">Nama Majelis <span class="text-slate-600 font-normal">(Opsional)</span></label>
                        <input type="text" name="nama_majelis" value="{{ old('nama_majelis', $group->nama_majelis) }}" placeholder="Masukkan nama majelis..." 
                            class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs text-slate-400 font-semibold mb-1.5 tracking-wide uppercase">Daerah Asal (Kota/Kab)</label>
                        <input type="text" name="daerah" required value="{{ old('daerah', $group->daerah) }}" placeholder="Contoh: Garut / Tasikmalaya" 
                            class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs text-slate-400 font-semibold mb-1.5 tracking-wide uppercase">No. WhatsApp Admin</label>
                        <input type="text" name="nomor_hp" required value="{{ old('nomor_hp', $group->nomor_hp) }}" placeholder="Contoh: 628123456789" 
                            class="custom-input w-full rounded-xl px-4 py-3 text-sm font-mono focus:outline-none transition">
                        <p class="text-[10px] text-slate-500 mt-1.5 pl-1">*Wajib diawali angka 62 langsung tanpa spasi.</p>
                    </div>
                </div>

                <div class="border-t border-slate-800 pt-5 mt-2">
                    <label class="block text-xs text-amber-400 font-bold mb-2.5 tracking-wide uppercase">Daftar Foto Galeri Kegiatan (Bisa Pilih Banyak)</label>
                    
                    <div class="bg-black/40 p-4 rounded-xl border border-slate-800 space-y-4">
                        
                        <div id="preview-container" class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                            @if($group->foto && is_array($group->foto))
                                @foreach($group->foto as $img)
                                    <div class="aspect-square rounded-lg bg-slate-900 border border-slate-800 overflow-hidden shadow-md">
                                        <img src="{{ asset($img) }}" class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            @else
                                <div id="preview-placeholder" class="col-span-full py-6 text-center text-slate-500 text-xs flex flex-col items-center justify-center gap-2">
                                    <span class="text-3xl opacity-30">🕌</span>
                                    <span>Belum ada foto yang diunggah untuk grup ini.</span>
                                </div>
                            @endif
                        </div>

                        <div class="pt-2 border-t border-slate-800/60">
                            <input type="file" name="foto[]" id="foto-input" accept="image/*" multiple
                                class="block w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-400 hover:file:bg-emerald-900 transition file:cursor-pointer cursor-pointer">
                            <p class="text-[10px] text-slate-500 mt-2.5 pl-1">
                                *Kamu bisa menyeleksi lebih dari 1 foto sekaligus saat memilih berkas. Format: JPG, JPEG, PNG. Maksimal 2MB per file.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse sm:flex-row gap-3 pt-4">
                    <a href="{{ route('admin.dashboard') }}" class="w-full sm:w-1/3 bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-center text-sm py-3.5 rounded-xl transition duration-200 shadow-md flex items-center justify-center gap-2">
                        ❌ Batal
                    </a>
                    <button type="submit" class="w-full sm:w-2/3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-extrabold text-sm py-3.5 rounded-xl shadow-lg transition duration-200 tracking-wider uppercase flex items-center justify-center gap-2">
                        💾 Simpan Data (Save)
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto-input').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('preview-container');
        const placeholder = document.getElementById('preview-placeholder');
        
        // Bersihkan kontainer preview lama jika admin memilih file baru
        container.innerHTML = '';
        
        if (files.length > 0) {
            if(placeholder) placeholder.style.display = 'none';
            
            // Lakukan looping untuk membaca setiap gambar yang dipilih
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'aspect-square rounded-lg bg-slate-900 border border-slate-800 overflow-hidden shadow-md';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-full object-cover';
                    
                    div.appendChild(img);
                    container.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        } else {
            if(placeholder) placeholder.style.display = 'flex';
        }
    });
</script>
@endsection
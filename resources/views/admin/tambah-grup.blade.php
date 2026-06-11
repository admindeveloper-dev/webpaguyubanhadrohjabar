@extends('layouts.main')

@section('content')
<style>
    .create-page-bg {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: 100vh;
        padding-top: 2rem;
        padding-bottom: 4rem;
    }
    .premium-card {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #065f46 !important; /* Border emerald khas */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important;
        border-radius: 1.5rem !important;
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

<div class="create-page-bg w-full px-4">
    <div class="w-full max-w-xl mx-auto">
        
        <div class="mb-5">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-wider text-slate-400 hover:text-amber-400 transition duration-200">
                ⬅️ Kembali ke Dashboard
            </a>
        </div>

        <div class="premium-card p-6 sm:p-8">
            <div class="text-center mb-6">
                <span class="text-[10px] font-extrabold tracking-widest text-emerald-400 uppercase bg-emerald-400/10 border border-emerald-500/20 px-3 py-1 rounded-md">
                    Input Data Multi-Galeri
                </span>
                <h2 class="text-white font-black text-xl sm:text-2xl mt-3 tracking-wide">
                    Tambah <span class="text-amber-400">Grup Hadroh</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Daftarkan grup baru beserta berkas foto dokumentasi kegiatannya</p>
            </div>

            <form action="{{ route('admin.hadroh.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">Nama Grup Hadroh</label>
                    <input type="text" name="nama_grup" required placeholder="Masukkan nama grup hadroh..." 
                        class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition placeholder-slate-600 font-medium">
                </div>

                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">Nama Majelis <span class="text-slate-600 font-normal">(Opsional)</span></label>
                    <input type="text" name="nama_majelis" placeholder="Masukkan nama majelis taklim..." 
                        class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition placeholder-slate-600 font-medium">
                </div>

                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">Daerah Asal (Kota/Kab)</label>
                    <input type="text" name="daerah" required placeholder="Contoh: Garut / Tasikmalaya" 
                        class="custom-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition placeholder-slate-600 font-medium">
                </div>

                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">No. HP / WhatsApp Admin Grup</label>
                    <input type="text" name="nomor_hp" required placeholder="Contoh: 628123456789" 
                        class="custom-input w-full rounded-xl px-4 py-3 text-sm font-mono focus:outline-none transition placeholder-slate-600">
                    <p class="text-[10px] text-slate-500 mt-1.5 pl-1">*Wajib diawali angka 62 langsung tanpa spasi.</p>
                </div>

                <div class="border-t border-slate-800 pt-4 mt-2">
                    <label class="block text-xs text-amber-400 font-bold mb-2 tracking-wide uppercase">Upload Foto Kegiatan (Bisa Pilih Banyak)</label>
                    
                    <div class="bg-black/40 p-4 rounded-xl border border-slate-800 space-y-4">
                        <div id="preview-container" class="grid grid-cols-3 gap-3">
                            <div id="preview-placeholder" class="col-span-full py-4 text-center text-slate-500 text-[11px] flex flex-col items-center justify-center gap-1.5">
                                <span class="text-2xl opacity-30">🕌</span>
                                <span>Belum ada foto yang dipilih.</span>
                            </div>
                        </div>

                        <div class="pt-2 border-t border-slate-800/60">
                            <input type="file" name="foto[]" id="foto-input" accept="image/*" multiple required
                                class="block w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-400 hover:file:bg-emerald-900 transition file:cursor-pointer cursor-pointer">
                            <p class="text-[10px] text-slate-500 mt-2 pl-1">
                                *Pilih langsung beberapa foto sekaligus dengan menahan tombol Ctrl/Shift.
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-extrabold text-xs py-3.5 rounded-xl shadow-lg hover:shadow-emerald-900/30 transition duration-200 mt-4 uppercase tracking-widest">
                    💾 Simpan Data Grup
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('foto-input').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('preview-container');
        const placeholder = document.getElementById('preview-placeholder');
        
        container.innerHTML = '';
        
        if (files.length > 0) {
            if(placeholder) placeholder.style.display = 'none';
            
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
@extends('layouts.main')

@section('content')
<style>
    .login-page-bg {
        background-color: #0b1329 !important;
        color: #f8fafc !important;
        min-height: calc(100vh - 140px); /* Menyesuaikan tinggi agar pas di tengah antara navbar & footer */
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2rem;
        padding-bottom: 3rem;
    }
    .login-card {
        background: linear-gradient(145deg, #111827, #1f2937) !important;
        border: 1px solid #065f46 !important; /* Border emerald tipis yang elegan */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7) !important;
        border-radius: 1.5rem !important;
    }
    .login-input {
        background-color: #030712 !important;
        border: 1px solid #1f2937 !important;
        color: #f8fafc !important;
    }
    .login-input:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2) !important;
    }
</style>

<div class="login-page-bg w-full px-4">
    <div class="w-full max-w-sm">
        
        <div class="login-card p-6 sm:p-8">
            
            <div class="text-center mb-6">
                <span class="text-[10px] font-extrabold tracking-widest text-emerald-400 uppercase bg-emerald-400/10 border border-emerald-500/20 px-3 py-1 rounded-md">
                    Gerbang Autentikasi
                </span>
                <h2 class="text-white font-black text-xl sm:text-2xl mt-3 tracking-wide">
                    Login <span class="text-amber-400">Admin</span>
                </h2>
                <p class="text-[11px] text-slate-400 mt-1">Khusus pengurus dan pengelola data paguyuban</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">User / Email</label>
                    <input type="email" name="email" required placeholder="Masukkan email..." 
                        class="login-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition placeholder-slate-600 font-medium">
                </div>

                <div>
                    <label class="block text-xs text-slate-400 font-bold mb-1.5 pl-1 uppercase tracking-wider">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" 
                        class="login-input w-full rounded-xl px-4 py-3 text-sm focus:outline-none transition placeholder-slate-600">
                </div>

                <button type="submit" 
                    class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-black text-xs py-3.5 rounded-xl shadow-lg hover:shadow-emerald-900/30 transition duration-200 mt-4 uppercase tracking-widest">
                    Masuk Sekarang 🔐
                </button>
            </form>
        </div>

        <div class="mt-6 bg-gradient-to-r from-amber-400 to-yellow-400 p-0.5 rounded-2xl shadow-xl shadow-amber-500/10">
            <a href="{{ route('pengunjung.list') }}" 
               class="flex items-center justify-center gap-2 w-full bg-slate-950 hover:bg-transparent text-amber-400 hover:text-slate-950 font-black text-xs py-4 rounded-[14px] transition-all duration-300 uppercase tracking-widest text-center">
                👋 Masuk Sebagai Pengunjung
            </a>
        </div>

    </div>
</div>
@endsection
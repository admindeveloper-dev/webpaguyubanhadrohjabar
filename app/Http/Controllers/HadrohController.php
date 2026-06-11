<?php

namespace App\Http\Controllers;

use App\Models\HadrohGroup;
use Illuminate\Http\Request;

class HadrohController extends Controller
{
    // ==========================================
    // 1. HALAMAN LIST SEMUA GRUP (Gambar 4)
    // ==========================================
    public function index()
    {
        $groups = HadrohGroup::all();
        
        // UPDATE: Diubah dari 'pengunjung.list' menjadi 'pengunjung.list-grup' 
        // sesuai dengan nama file asli yang kamu miliki di folder views
        return view('pengunjung.list-grup', compact('groups'));
    }

    // ==========================================
    // 2. HALAMAN DETAIL GRUP (Gambar 5)
    // ==========================================
    public function show($id)
    {
        $group = HadrohGroup::findOrFail($id);
        return view('pengunjung.detail-grup', compact('group'));
    }

    // ==========================================
    // 3. HALAMAN GALERI DINAMIS (Konsep Baru)
    // ==========================================
    public function galeri($id)
    {
        $group = HadrohGroup::findOrFail($id);
        
        // Mengarahkan pengunjung ke halaman galeri eksklusif milik grup tersebut
        return view('pengunjung.galeri-grup', compact('group'));
    }

    // ==========================================
    // 4. FORM ORDER / UNDANG GRUP (Gambar 6)
    // ==========================================
    public function orderForm($id)
    {
        $group = HadrohGroup::findOrFail($id);
        return view('pengunjung.order', compact('group'));
    }

    // ==========================================
    // 5. PROSES SIMPAN ORDERAN KE DATABASE
    // ==========================================
    public function storeOrder(Request $request, $id)
    {
        $group = HadrohGroup::findOrFail($id);

        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'tanggal_acara' => 'required|date',
            'lokasi_acara' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        // Silakan sesuaikan logika penyimpanan orderan/pesanan kamu di sini jika ada tabel orders

        return redirect()->route('pengunjung.detail', $group->id)
                         ->with('success', 'Permintaan undangan berhasil dikirim!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\HadrohGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        $groups = HadrohGroup::all();
        return view('admin.dashboard', compact('groups'));
    }

    public function create()
    {
        return view('admin.tambah-grup');
    }

    // Proses Simpan Data Tambah (Mendukung Banyak Foto)
    public function store(Request $request)
    {
        $request->validate([
            'nama_grup' => 'required|string',
            'nama_majelis' => 'nullable|string',
            'daerah' => 'required|string',
            'nomor_hp' => 'required|string',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi array foto
        ]);

        $data = $request->except('foto');
        $images = [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $nama_foto = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('grup_hadroh'), $nama_foto);
                $images[] = 'grup_hadroh/' . $nama_foto;
            }
            $data['foto'] = $images; // Simpan sebagai array
        }

        HadrohGroup::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Grup berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $group = HadrohGroup::findOrFail($id);
        return view('admin.edit-grup', compact('group'));
    }

    // Proses Update Data Edit (Mendukung Tambah/Ganti Banyak Foto Sekaligus)
    public function update(Request $request, $id)
    {
        $group = HadrohGroup::findOrFail($id);
        
        $request->validate([
            'nama_grup' => 'required|string',
            'nama_majelis' => 'nullable|string',
            'daerah' => 'required|string',
            'nomor_hp' => 'required|string',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('foto');
        
        // Ambil foto lama yang sudah ada di database agar tidak terhapus jika tidak ganti foto
        $images = $group->foto ?? [];

        if ($request->hasFile('foto')) {
            // Hapus fisik foto-foto lama terlebih dahulu agar tidak memenuhi harddisk
            if (!empty($group->foto)) {
                foreach ($group->foto as $old_foto) {
                    if (file_exists(public_path($old_foto))) {
                        unlink(public_path($old_foto));
                    }
                }
            }

            // Reset array dan masukkan foto-foto baru
            $images = [];
            foreach ($request->file('foto') as $file) {
                $nama_foto = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('grup_hadroh'), $nama_foto);
                $images[] = 'grup_hadroh/' . $nama_foto;
            }
        }

        $data['foto'] = $images;
        $group->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Grup dan Galeri berhasil diupdate!');
    }

    public function destroy($id)
    {
        $group = HadrohGroup::findOrFail($id);
        
        if (!empty($group->foto)) {
            foreach ($group->foto as $old_foto) {
                if (file_exists(public_path($old_foto))) {
                    unlink(public_path($old_foto));
                }
            }
        }

        $group->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Grup berhasil dihapus!');
    }
}
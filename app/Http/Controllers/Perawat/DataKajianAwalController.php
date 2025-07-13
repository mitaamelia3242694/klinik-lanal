<?php

namespace App\Http\Controllers\Perawat;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\PengkajianAwal;
use App\Http\Controllers\Controller;

class DataKajianAwalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $pengkajian = PengkajianAwal::with(['pasien', 'user'])
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%$search%");
                })->orWhereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(5);

        $pasiens = Pasien::all(); // untuk dropdown tambah
        $perawats = User::where('role_id', 4)->get();

        return view('Perawat.data-kajian-awal.index', compact('pengkajian', 'pasiens', 'perawats'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'keluhan_utama' => 'required|string',
            'tekanan_darah' => 'required|string',
            'suhu_tubuh' => 'required|string',
            'status' => 'required|in:belum,sudah',
            'catatan' => 'nullable|string',
        ]);

        PengkajianAwal::create($request->all());

        return redirect()->route('data-kajian-awal.index')->with('success', 'Data kajian awal berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kajian = PengkajianAwal::with(['pasien', 'user'])->findOrFail($id);

        return view('Perawat.data-kajian-awal.show', compact('kajian'));
    }

    public function edit($id)
    {
        $kajian = PengkajianAwal::findOrFail($id);
        $pasiens = Pasien::all();
        $perawats = User::where('role_id', '4')->get();

        return view('Perawat.data-kajian-awal.edit', compact('kajian', 'pasiens', 'perawats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien,id',
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'keluhan_utama' => 'required|string',
            'tekanan_darah' => 'required|string',
            'suhu_tubuh' => 'required|string',
            'status' => 'required|in:belum,sudah',
            'catatan' => 'nullable|string',
        ]);

        $kajian = PengkajianAwal::findOrFail($id);
        $kajian->update($request->all());

        return redirect()->route('data-kajian-awal.index')->with('success', 'Data kajian awal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kajian = PengkajianAwal::findOrFail($id);
        $kajian->delete();

        return redirect()->route('data-kajian-awal.index')->with('success', 'Data kajian awal berhasil dihapus.');
    }
}
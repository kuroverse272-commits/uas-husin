<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class UtsController extends Controller
{
    public function beranda()
    {
        return view('uts.beranda');
    }

    public function produk()
    {
        return view('uts.produk');
    }

    public function kontak()
    {
        return view('uts.kontak');
    }

    public function pendaftaran(Request $request)
    {
        $menu = $request->query('menu');
        $data = [];
        if ($menu === 'data') {
            $data = Mahasiswa::all();
        }
        return view('uts.pendaftaran', compact('menu', 'data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tgl' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'jk' => 'required|string|max:255',
            'alamat' => 'required|string',
            'sekolah' => 'required|string|max:255',
            'mtk' => 'required|numeric',
            'inggris' => 'required|numeric',
            'indo' => 'required|numeric',
            'pil1' => 'required|string|max:255',
            'pil2' => 'required|string|max:255',
            'alasan' => 'required|string',
        ]);

        Mahasiswa::create($validated);

        return redirect()->to(url('/uts/pendaftaran?menu=data'))->with('success', 'Data pendaftaran berhasil disimpan!');
    }

    public function edit($id)
    {
        $d = Mahasiswa::findOrFail($id);
        return view('uts.edit', compact('d'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tgl' => 'required|string|max:255',
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'jk' => 'required|string|max:255',
            'alamat' => 'required|string',
            'sekolah' => 'required|string|max:255',
            'mtk' => 'required|numeric',
            'inggris' => 'required|numeric',
            'indo' => 'required|numeric',
            'pil1' => 'required|string|max:255',
            'pil2' => 'required|string|max:255',
            'alasan' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validated);

        return redirect()->to(url('/uts/pendaftaran?menu=data'))->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->to(url('/uts/pendaftaran?menu=data'))->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}

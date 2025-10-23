<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projek;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProjectImport;
use App\Exports\ProjekExport;


class proyekController extends Controller
{
    /**
     * 🧩 Tampilkan semua data proyek
     */
    public function projek()
    {
        $inventaryprojek = projek::orderBy('created_at', 'desc')->get();
        return view('inventori.proyek', compact('inventaryprojek'));
    }

    /**
     * ➕ Simpan data baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'tipe' => 'required|string|max:100',
            'merk' => 'required|string|max:100',
            'ukuran' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
        ]);

        projek::create($request->all());

        return redirect()->route('view-projek')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * ✏️ Update data proyek
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'tipe' => 'required|string|max:100',
            'merk' => 'required|string|max:100',
            'ukuran' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
        ]);

        $inventaryprojek = projek::findOrFail($id);
        $inventaryprojek->update([
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->jenis,
            'tipe' => $request->tipe,
            'merk' => $request->merk,
            'ukuran' => $request->ukuran,
            'jumlah' => $request->jumlah,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Data proyek berhasil diperbarui!');
    }

    /**
     * ❌ Hapus data proyek
     */
    public function destroy($id)
    {
        $inventaryprojek = projek::findOrFail($id);
        $inventaryprojek->delete();

        return redirect()->back()->with('success', 'Data proyek berhasil dihapus!');
    }
      public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ProjectImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data proyek berhasil diimport!');
    }
public function export()
{
    return Excel::download(new projekExport, 'data_projek.xlsx');
}

public function filter(Request $request)
{
    $keyword = $request->input('keyword');

    $data = \App\Models\Projek::when($keyword, function ($query, $keyword) {
        $query->where('nama_barang', 'like', "%$keyword%")
              ->orWhere('jenis', 'like', "%$keyword%")
              ->orWhere('merk', 'like', "%$keyword%")
              ->orWhere('lokasi', 'like', "%$keyword%");
    })->get();

    return response()->json($data);
}

}
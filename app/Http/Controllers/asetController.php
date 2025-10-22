<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asetjual;

class asetController extends Controller
{
    public function aset()
    {
       $asset_jual = asetjual::orderBy('created_at', 'desc')->get();
return view('inventori.aset', compact('asset_jual'));
    }


     public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'ukuran' => 'required|string|max:100',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|int|min:1',
            'satuan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        asetjual::create($request->all());

        return redirect()->route('view-ws')->with('success', 'Data berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'ukuran' => 'required|string|max:100',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|int|min:1',
            'satuan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $inventaris = asetjual::findOrFail($id);
        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'jenis' => $request->jenis,
            'ukuran' => $request->ukuran,
            'dimensi' => $request->dimensi,
            'qty' =>$request->qty,
            'satuan'=>$request->satuan,
            'lokasi'=>$request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Data inventaris berhasil diperbarui!');
    }

    /**
     * ❌ Hapus data
     */
    public function destroy($id)
    {
        $inventaris = asetjual::findOrFail($id);
        $inventaris->delete();

        return redirect()->back()->with('success', 'Data inventaris berhasil dihapus!');
    }
}

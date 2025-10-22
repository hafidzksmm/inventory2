<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ws;

class inventoriController extends Controller
{
    public function ws()
    {
       $inventaris = ws::orderBy('created_at', 'desc')->get();
return view('inventori.ws', compact('inventaris'));
    }


     public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'merk' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:100',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|int|min:1',
            'satuan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        ws::create($request->all());

        return redirect()->route('view-ws')->with('success', 'Data berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'merk' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:100',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|int|min:1',
            'satuan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $inventaris = ws::findOrFail($id);
        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'deskripsi' => $request->deskripsi,
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
        $inventaris = ws::findOrFail($id);
        $inventaris->delete();

        return redirect()->back()->with('success', 'Data inventaris berhasil dihapus!');
    }
}

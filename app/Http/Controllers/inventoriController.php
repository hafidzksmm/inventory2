<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ws;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Imports\InventoriImport;
use Maatwebsite\Excel\Excel as ExcelWriter;

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
            'deskripsi' => 'required|string|max:255',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|integer|min:1',
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
            'deskripsi' => 'required|string|max:255',
            'dimensi' => 'required|string|max:100',
            'qty' => 'required|integer|min:1',
            'satuan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        $inventaris = ws::findOrFail($id);
        $inventaris->update($request->all());

        return redirect()->back()->with('success', 'Data inventaris berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $inventaris = ws::findOrFail($id);
        $inventaris->delete();
        return redirect()->back()->with('success', 'Data inventaris berhasil dihapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new InventoriImport, $request->file('file'));
        return redirect()->back()->with('success', 'Data inventaris berhasil diimport!');
    }

    public function export(Request $request)
    {
        $query = ws::query();

        if ($request->filled('nama_barang')) {
            $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
        }
        if ($request->filled('merk')) {
            $query->where('merk', 'like', '%' . $request->merk . '%');
        }
        if ($request->filled('deskripsi')) {
            $query->where('deskripsi', 'like', '%' . $request->deskripsi . '%');
        }

        $data = $query->get([
            'nama_barang', 'merk', 'deskripsi', 'dimensi', 'qty', 'satuan', 'lokasi', 'created_at',
        ]);

        $exportData = new Collection();
        $exportData->push(['No', 'Nama Barang', 'Merk', 'Deskripsi', 'Dimensi', 'Qty', 'Satuan', 'Lokasi', 'Tanggal Dibuat']);

        foreach ($data as $index => $item) {
            $exportData->push([
                $index + 1,
                $item->nama_barang,
                $item->merk,
                $item->deskripsi,
                $item->dimensi,
                $item->qty,
                $item->satuan,
                $item->lokasi,
                $item->created_at ? $item->created_at->format('d-m-Y') : '',
            ]);
        }

        return Excel::download(
            new class($exportData) implements \Maatwebsite\Excel\Concerns\FromCollection {
                protected $exportData;
                public function __construct($exportData)
                {
                    $this->exportData = $exportData;
                }
                public function collection()
                {
                    return $this->exportData;
                }
            },
            'Data_Inventaris_' . now()->format('Ymd_His') . '.xlsx',
            ExcelWriter::XLSX
        );
    }

    public function filter(Request $request)
    {
        $query = ws::query();

        if ($request->filled('nama_barang')) {
            $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
        }
        if ($request->filled('merk')) {
            $query->where('merk', 'like', '%' . $request->merk . '%');
        }
        if ($request->filled('deskripsi')) {
            $query->where('deskripsi', 'like', '%' . $request->deskripsi . '%');
        }

        $inventaris = $query->orderBy('created_at', 'desc')->get();
        return view('inventori.ws', compact('inventaris'));
    }
}

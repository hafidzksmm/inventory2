<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {
        $countProjek = DB::table('inventaryprojek')->count();
        $countInventaris = DB::table('inventaris')->count();
        $countAssetjual = DB::table('asset_jual')->count();

        return view('dashboard', compact('countProjek', 'countInventaris', 'countAssetjual'));
    }
}
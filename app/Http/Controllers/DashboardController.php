<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Storage;
use App\Models\KeluhanPelanggan;

class DashboardController extends Controller
{
    public function index()
    {
        // umur keluhan = datetime sekarang - datetime keluhan
        $top10Keluhan = KeluhanPelanggan::select('id', 'nama', 'email', 'nomor_hp', 'status_keluhan', 'keluhan', 'created_at')
            ->orderBy('created_at', 'asc')
            ->limit(10)
            ->get()
            ->map(function ($keluhan) {
                // Menghitung umur keluhan (selisih antara sekarang dan waktu keluhan dibuat)
                $keluhan->umur_keluhan = now()->diffInDays($keluhan->created_at);
                return $keluhan;
            });
        return response()->json($top10Keluhan, 200);
    }
    public function getDataKeluhan()
    {
        // Data Pie Chart Keluhan (Keluhan by Status Keluhan)
        $dataPieChartKeluhan = KeluhanPelanggan::select('status_keluhan', KeluhanPelanggan::raw('count(*) as total'))
            ->groupBy('status_keluhan')
            ->get();

        // Data Bar Chart Keluhan (Keluhan by Month)
        $dataBarChartKeluhan = KeluhanPelanggan::select(KeluhanPelanggan::raw('MONTH(created_at) as month, status_keluhan'), KeluhanPelanggan::raw('count(*) as total'))
            ->groupBy('month', 'status_keluhan')
            ->get();

        return response()->json([
            'dataPieChartKeluhan' => $dataPieChartKeluhan,
            'dataBarChartKeluhan' => $dataBarChartKeluhan,
        ], 200);
    }
}

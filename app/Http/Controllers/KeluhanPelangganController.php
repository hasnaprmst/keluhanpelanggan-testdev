<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Storage;
use App\Models\KeluhanPelanggan;
use App\Models\KeluhanStatusHis;
use App\Exports\KeluhanPelangganExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Carbon\Carbon;

class KeluhanPelangganController extends Controller
{
    public function index()
    {
        return response()->json(KeluhanPelanggan::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'nomor_hp' => 'required|numeric',
            'status_keluhan' => 'required|string|max:1',
            'keluhan' => 'required|string|min:50|max:255',
        ]);

        $keluhan = KeluhanPelanggan::create($validatedData);

        // Simpan ke tabel keluhan_status_his
        $keluhanStatusHis = new KeluhanStatusHis();
        $keluhanStatusHis->keluhan_id = $keluhan->id;
        $keluhanStatusHis->status_keluhan = $validatedData['status_keluhan'];
        $keluhanStatusHis->save();

        return response()->json($keluhan, 201);
    }

    public function show($id)
    {
        $keluhan = KeluhanPelanggan::find($id);

        if (!$keluhan) {
            return response()->json(['message' => 'Keluhan pelanggan tidak ditemukan'], 404);  
        }
    
        return response()->json($keluhan, 200);
    }

    public function update(Request $request, $id)
    {
        $keluhan = KeluhanPelanggan::find($id);

        if (!$keluhan) {
            return response()->json(['message' => 'Keluhan tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'nomor_hp' => 'required|numeric',
            'status_keluhan' => 'required|string|max:1',
            'keluhan' => 'required|string|min:50|max:255',
        ]);

        $keluhan->update($validatedData);

        // Simpan ke tabel keluhan_status_his
        $keluhanStatusHis = new KeluhanStatusHis();
        $keluhanStatusHis->keluhan_id = $keluhan->id;
        $keluhanStatusHis->status_keluhan = $validatedData['status_keluhan'];
        $keluhanStatusHis->save();
        
        return response()->json($keluhan, 200);
    }

    public function destroy($id)
    {
        $keluhan = KeluhanPelanggan::find($id);

        if ($keluhan) {
            $keluhan->delete();
            return response()->json(['message' => 'Keluhan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Keluhan tidak ditemukan'], 404);
        }
    }

    public function history()
    {
        return response()->json(KeluhanStatusHis::all(), 200);
    }

    // public function export(Request $request, $format)
    // {
    //     if ($format == 'csv') {
    //         return Excel::download(new KeluhanPelangganExport, 'keluhan_pelanggan-' . date('Y-m-d') . '.csv');
    //     } elseif ($format == 'xls') {
    //         return Excel::download(new KeluhanPelangganExport, 'keluhan_pelanggan-' . date('Y-m-d') . '.xls');
    //     } elseif ($format == 'txt') {
    //         return response()->stream(function () {
    //             $keluhan = KeluhanPelanggan::all();
    //             $output = "";
    //             foreach ($keluhan as $item) {
    //                 $output .= "ID: {$item->id}\nNama: {$item->nama}\nEmail: {$item->email}\nNomor HP: {$item->nomor_hp}\nStatus Keluhan: {$item->status_keluhan}\nKeluhan: {$item->keluhan}\n\n";
    //             }
    //             echo $output;
    //         }, 200, [
    //             'Content-Type' => 'text/plain',
    //             'Content-Disposition' => 'attachment; filename="keluhan_pelanggan-' . date('Y-m-d') . '.txt"',
    //         ]);
    //     } elseif ($format == 'pdf') {
    //         $keluhan = KeluhanPelanggan::all();
    //         $pdf = PDF::loadView('keluhan_pelanggan.pdf', ['keluhan' => $keluhan]);
    //         return $pdf->download('keluhan_pelanggan-' . date('Y-m-d') . '.pdf');
    //     }
    //     return abort(404);
    // }

    public function exportData(){
        return response()->json(KeluhanPelanggan::all(), 200);
    }

    public function exportTxt()
    {
        $data = KeluhanPelanggan::all()->toArray();
        $filename = "keluhan_pelanggan.txt";

        // Buat dan simpan file .txt
        $file = fopen($filename, 'w');
        foreach ($data as $line) {
            fwrite($file, implode(",", $line) . PHP_EOL);
        }
        fclose($file);

        return response()->download($filename);
    }

    public function exportCsv()
    {
        return Excel::download(new KeluhanPelangganExport, 'keluhan_pelanggan.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function exportXls()
    {
        return Excel::download(new KeluhanPelangganExport, 'keluhan_pelanggan.xls');
    }

    public function exportPdf()
    {
        $data = KeluhanPelanggan::all();

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Buat HTML untuk PDF
        $html = view('keluhan_pelanggan.pdf', compact('data'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('keluhan_pelanggan.pdf');
    }

    public function updateStatus(Request $request, $id)
    {
        $keluhan = KeluhanPelanggan::find($id);

        if (!$keluhan) {
            return response()->json(['message' => 'Keluhan tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'status_keluhan' => 'required|string|max:1',
        ]);

        $keluhan->update($validatedData);

        $keluhanStatusHis = new KeluhanStatusHis();
        $keluhanStatusHis->keluhan_id = $keluhan->id;
        $keluhanStatusHis->status_keluhan = $validatedData['status_keluhan'];
        $keluhanStatusHis->save();
        
        return response()->json($keluhan, 200);
    }

    public function deleteKeluhanById($id)
    {
        $keluhan = KeluhanPelanggan::find($id);

        if ($keluhan) {
            $keluhan->delete();
            return response()->json(['message' => 'Keluhan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Keluhan tidak ditemukan'], 404);
        }
    }
}

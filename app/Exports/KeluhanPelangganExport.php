<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\KeluhanPelanggan;

class KeluhanPelangganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KeluhanPelanggan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Nomor HP',
            'Status Keluhan',
            'Keluhan',
            'Created At',
        ];
    }
}

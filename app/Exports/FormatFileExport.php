<?php

namespace App\Exports;

use App\Model\Refugee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FormatFileExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
	use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Refugee::query()->where('id', 1)->orWhere('id', 2)->orWhere('id', 3);
    }

    public function headings(): array
    {
    	return [
    		'nama',
    		'gender',
    		'asal',
    		'tanggal_lahir',
    		'gol_darah',
    		'nomor_barak',
    		'deskripsi'
    	];
    }

    public function map($refugee): array
    {
    	return [
    		'berisi nama pengungsi',
    		'hanya boleh huruf L atau P (huruf besar)',
    		'berisi alamat lengkap (jika memungkinkan) dari pengungsi',
    		'isi dengan format tanggal/bulan/tahun, contoh: 30/12/2002',
    		'hanya boleh huruf A, B, AB, atau O (huruf besar)',
    		'berisi nomor barak. isi dengan angka 1 bila tidak tahu',
    		'berisi keterangan lebih lanjut mengenai pengungsi',
    	];
    }
}

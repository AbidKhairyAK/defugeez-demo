<?php

namespace App\Exports;

use App\Model\Refugee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RefugeesExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
	use Exportable;

	function __construct($post_id = null)
	{
		$this->post_id = $post_id;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Refugee::query()->where('post_id', $this->post_id);
    }

    public function headings(): array
    {
    	return [
    		'nama',
    		'gender',
    		'asal',
    		'tanggal lahir',
    		'gol. darah',
    		'nomor barak',
    		'deskripsi'
    	];
    }

    public function map($refugee): array
    {
    	return [
    		$refugee->name,
    		$refugee->gender,
    		$refugee->origin,
    		$refugee->birthdate,
    		$refugee->blood_type,
    		$refugee->barrack,
    		$refugee->description,
    	];
    }

}

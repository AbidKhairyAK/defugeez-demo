<?php

namespace App\Imports;

use App\Model\Refugee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RefugeesImport implements ToModel, WithHeadingRow
{
    use Importable;

    function __construct($event_id, $post_id, $user_id)
    {
        $this->event_id = $event_id;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Refugee([
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
            'event_id' => $this->event_id,
            'name' => $row['nama'],
            'gender' => $row['gender'],
            'origin' => $row['asal'],
            'birthdate' => Date::excelToDateTimeObject($row['tanggal_lahir']),
            'health' => 1,
            'status' => 1,
            'blood_type' => $row['gol_darah'],
            'barrack' => $row['nomor_barak'],
            'description' => $row['deskripsi'],
        ]);
    }
}

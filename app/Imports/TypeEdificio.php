<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\TipoEdificioModel;
class TypeEdificio implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        /* return new TipoEdificioModel([
            'name' => $row[0],
            'uno_a' => $row[1],
            'dos_a' => $row[2],
            'dos_b' => $row[3],
            'tres_a' => $row[4],
            'tres_b' => $row[5],
            'tres_b_coast' => $row[6],
            'tres_c' => $row[7],
            'energy_star' => $row[8],
            'status' => $row[9],
            'id_categoria' => $row[10],

        ]);
 */
        foreach ($rows as $row)
        {
            TipoEdificioModel::create([
                'name' => $row[0],
                'uno_a' => $row[1],
                'dos_a' => $row[2],
                'dos_b' => $row[3],
                'tres_a' => $row[4],
                'tres_b' => $row[5],
                'tres_b_coast' => $row[6],
                'tres_c' => $row[7],
                'energy_star' => $row[8],
                'status' => $row[9],
                'id_categoria' => $row[10],
            ]);
        }
    }
}

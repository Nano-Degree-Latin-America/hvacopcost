<?php

use Illuminate\Database\Seeder;

class tipo_edificio_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_edificios')->insert([
            'name' => 'Oficinas Administrativas',
            'uno_a' => 47,
            'dos_a' => 49,
            'dos_b' => 42,
            'tres_a' => 50,
            'tres_b' => 35,
            'tres_b_coast' => 41,
            'tres_c' => 33,
            'energy_star' => 52.9,
            'status'  =>  1,
            'id_categoria' => 1,
            ]);

        DB::table('categorias_edificios')->insert([
            'name' => 'Gobierno',
            'uno_a' => 59,
            'dos_a' => 61,
            'dos_b' => 52,
            'tres_a' => 62,
            'tres_b' => 44,
            'tres_b_coast' => 52,
            'tres_c' => 42,
            'energy_star' => 52.9,
            'status'  =>  1,
            'id_categoria' => 1,
            ]);

        DB::table('categorias_edificios')->insert([
            'name' => 'Usos Mixtos',
            'uno_a' => 55,
            'dos_a' => 56,
            'dos_b' => 48,
            'tres_a' => 57,
            'tres_b' => 40,
            'tres_b_coast' => 47,
            'tres_c' => 39,
            'energy_star' => 52.9,
            'status'  =>  1,
            'id_categoria' => 1,
            ]);

/* //////////////////////////////////////////////////////// */
DB::table('categorias_edificios')->insert([
    'name' => 'Universidad',
    'uno_a' => 75,
    'dos_a' => 74,
    'dos_b' => 64,
    'tres_a' => 75,
    'tres_b' => 47,
    'tres_b_coast' => 62,
    'tres_c' => 51,
    'energy_star' => 84,
    'status'  =>  1,
    'id_categoria' => 2,
    ]);

DB::table('categorias_edificios')->insert([
    'name' => 'Escuela Básica',
    'uno_a' => 46,
    'dos_a' => 45,
    'dos_b' => 38,
    'tres_a' => 45,
    'tres_b' => 32,
    'tres_b_coast' => 37,
    'tres_c' => 32,
    'energy_star' => 48.5,
    'status'  =>  1,
    'id_categoria' => 2,
    ]);

DB::table('categorias_edificios')->insert([
    'name' => 'Preparatoria / Liceo',
    'uno_a' => 55,
    'dos_a' => 54,
    'dos_b' => 46,
    'tres_a' => 55,
    'tres_b' => 35,
    'tres_b_coast' => 45,
    'tres_c' => 37,
    'energy_star' => 52.4,
    'status'  =>  1,
    'id_categoria' => 2,
    ]);

DB::table('categorias_edificios')->insert([
    'name' => 'Jadin Infantil / Guardería',
    'uno_a' => 59,
    'dos_a' => 58,
    'dos_b' => 49,
    'tres_a' => 57,
    'tres_b' => 42,
    'tres_b_coast' => 47,
    'tres_c' => 42,
    'energy_star' => 64.8,
    'status'  =>  1,
    'id_categoria' => 2,
    ]);

    /* /////////////////////////////////////// */
    DB::table('categorias_edificios')->insert([
        'name' => 'Oficinas Corporativas',
        'uno_a' => 67,
        'dos_a' => 69,
        'dos_b' => 59,
        'tres_a' => 71,
        'tres_b' => 49,
        'tres_b_coast' => 59,
        'tres_c' => 47,
        'energy_star' => 52.9,
        'status'  =>  1,
        'id_categoria' => 3,
        ]);


    DB::table('categorias_edificios')->insert([
        'name' => 'Sucursales Bancarias',
        'uno_a' => 73,
        'dos_a' => 72,
        'dos_b' => 61,
        'tres_a' => 70,
        'tres_b' => 52,
        'tres_b_coast' => 59,
        'tres_c' => 54,
        'energy_star' => 88.3,
        'status'  =>  1,
        'id_categoria' => 3,
        ]);

        /* ////////////////////// */

DB::table('categorias_edificios')->insert([
    'name' => 'Consultorio Médico',
    'uno_a' => 41,
    'dos_a' => 39,
    'dos_b' => 34,
    'tres_a' => 39,
    'tres_b' => 31,
    'tres_b_coast' => 34,
    'tres_c' => 27,
    'energy_star' => 51.2,
    'status'  =>  1,
    'id_categoria' => 1,
    ]);

DB::table('categorias_edificios')->insert([
    'name' => 'Clínica Médica s/camas',
    'uno_a' => 61,
    'dos_a' => 59,
    'dos_b' => 52,
    'tres_a' => 57,
    'tres_b' => 48,
    'tres_b_coast' => 52,
    'tres_c' => 41,
    'energy_star' => 64.5,
    'status'  =>  1,
    'id_categoria' => 1,
    ]);

DB::table('categorias_edificios')->insert([
    'name' => 'Hospitales',
    'uno_a' => 172,
    'dos_a' => 174,
    'dos_b' => 149,
    'tres_a' => 169,
    'tres_b' => 142,
    'tres_b_coast' => 147,
    'tres_c' => 131,
    'energy_star' => 234.3,
    'status'  =>  1,
    'id_categoria' => 1,
    ]);


    DB::table('categorias_edificios')->insert([
        'name' => 'Comunidad Retirados',
        'uno_a' => 102,
        'dos_a' => 101,
        'dos_b' => 86,
        'tres_a' => 99,
        'tres_b' => 73,
        'tres_b_coast' => 82,
        'tres_c' => 76,
        'energy_star' => 99,
        'status'  =>  1,
        'id_categoria' => 1,
        ]);


    DB::table('categorias_edificios')->insert([
        'name' => 'Veterinarias',
        'uno_a' => 61,
        'dos_a' => 59,
        'dos_b' => 52,
        'tres_a' => 57,
        'tres_b' => 48,
        'tres_b_coast' => 52,
        'tres_c' => 41,
        'energy_star' => 64.5,
        'status'  =>  1,
        'id_categoria' => 1,
        ]);


}
}

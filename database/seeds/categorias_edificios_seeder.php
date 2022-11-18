<?php

use Illuminate\Database\Seeder;

class categorias_edificios_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_edificios')->insert([
            'name' => 'Oficina',
            'status'  =>  1,
            'id_user' => 1,
            ]);

        DB::table('categorias_edificios')->insert([
             'name' => 'Educación',
            'status'  =>  1,
             'id_user' => 1,
             ]);

      DB::table('categorias_edificios')->insert([
         'name' => 'Bancos',
        'status'  =>  1,
         'id_user' => 1,
          ]);

          DB::table('categorias_edificios')->insert([
            'name' => 'Salud',
            'status'  =>  1,
            'id_user' => 1,
            ]);

        DB::table('categorias_edificios')->insert([
             'name' => 'Hospitalidad',
            'status'  =>  1,
             'id_user' => 1,
             ]);

      DB::table('categorias_edificios')->insert([
         'name' => 'Residencial',
        'status'  =>  1,
         'id_user' => 1,
          ]);

    DB::table('categorias_edificios')->insert([
            'name' => 'Religioso',
           'status'  =>  1,
            'id_user' => 1,
            ]);

     DB::table('categorias_edificios')->insert([
        'name' => 'Retail',
       'status'  =>  1,
        'id_user' => 1,
         ]);



         DB::table('categorias_edificios')->insert([
            'name' => 'Automotriz',
           'status'  =>  1,
            'id_user' => 1,
             ]);

             DB::table('categorias_edificios')->insert([
               'name' => 'Servicios',
               'status'  =>  1,
               'id_user' => 1,
               ]);

           DB::table('categorias_edificios')->insert([
                'name' => 'Restaurantes',
               'status'  =>  1,
                'id_user' => 1,
                ]);

         DB::table('categorias_edificios')->insert([
            'name' => 'Almacenaje',
           'status'  =>  1,
            'id_user' => 1,
             ]);

       DB::table('categorias_edificios')->insert([
               'name' => 'Tecnología',
              'status'  =>  1,
               'id_user' => 1,
               ]);

        DB::table('categorias_edificios')->insert([
           'name' => 'Esparcimiento',
          'status'  =>  1,
           'id_user' => 1
            ]);

    }
}

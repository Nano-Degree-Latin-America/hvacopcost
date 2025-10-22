<?php

use Illuminate\Database\Seeder;
use App\User;
class UsuariosDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 20; $i++) {
            $user=new User;
            $user->name='UsuarioDemo'.$i;
            $user->email='usuario'.$i.'@example.com';
            $user->id_empresa=75;
            $user->password=Hash::make('12345678');
            $user->tipo_user=1;
            $user->fecha_inicio='2025-10-22';
            $user->fecha_termino='2025-11-08';
            $user->status=1;
            $user->save();
        }

    }
}

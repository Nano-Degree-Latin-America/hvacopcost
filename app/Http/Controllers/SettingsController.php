<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function setDegreeHrs(Request $request)
    {
            DB::table('ciudad_hrs_mes')->insert([
                'idCiudad' => $request->input('idCiudad'),
                'mes' => $request->input('mes'),
                'cooling' => $request->input('cooling'),
                'heating' => $request->input('heating'),
                'activoCooling' => $request->input('activoCooling')
            ]);

        return 'ok';
    }
}

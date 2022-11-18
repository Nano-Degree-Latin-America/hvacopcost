<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function getPaises(Request $request)
    {
        $submit = DB::table('pais')
        ->orderBy('pais', 'asc')
        ->get();        
        
        return response()->json($submit);
    }
    public function getCiudades(Request $request)
    {
        $submit = DB::table('ciudad')
        ->where('idPais', $request->input('idPais'))
        ->orderBy('ciudad', 'asc')
        ->get();        
        
        return response()->json($submit);
    }
    public function getDegreeHrs(Request $request)
    {
        $submit = DB::table('ciudad_hrs_mes')
        ->where('idCiudad', $request->input('idCiudad'))
        ->get();        
        
        return response()->json($submit);
    }
}
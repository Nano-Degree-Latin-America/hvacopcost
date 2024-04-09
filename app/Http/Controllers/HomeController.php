<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /*  $this->middleware('auth'); */
     /*   $this->middleware(['auth', 'verified']); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function redirect_login(Request $request){
        return view('login');
        /* return redirect('/login'); */
    }

    public function check_mail($mail)
    {
        $user = DB::table('users')
        ->where('users.email', '=',$mail)
        ->select('users.email')
        ->first();

        if($user){
            return 1;
        }else{
            return 2;
        }
    }
}

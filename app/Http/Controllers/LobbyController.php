<?php

namespace App\Http\Controllers;
use DateTime;
use DB;
use Illuminate\Support\Facades\Storage;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){



        return view('lobby');
    }

}

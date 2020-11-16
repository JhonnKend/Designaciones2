<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hoy = date('Y/m/d');
        $fechas = \DB::table('enable_periods')
        ->join('gestion','gestion.id','=','enable_periods.id_gestion')
        ->join('periods','periods.id','=','enable_periods.id_period')
        ->where('enable_periods.date_end','>', $hoy)
        ->where('enable_periods.date_start','<=', $hoy)
        ->get([
            'enable_periods.id','enable_periods.date_start','enable_periods.date_end',
            'gestion.gestion',
            'periods.period',
        ]);
        return view('home',compact('fechas'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Transaction;
use Carbon\Carbon;

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
        $month = Transaction::whereBetween('created_at', [Carbon::now()->copy()->startOfYear(), Carbon::now()->copy()->endOfYear()])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val){
                return Carbon::parse($val->created_at)->format('d M Y');
            });
            // dd($month);
        return view('home',compact('month'));
    }
}

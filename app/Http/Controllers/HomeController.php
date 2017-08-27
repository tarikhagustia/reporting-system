<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Saleout;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = Target::getTarget();
        $penjualan = Saleout::all()->sum('quantity');
        $pencapaian = Saleout::ambilPencapaian()->get()->sum('sub_total');
        if($target):
          $presentase = ($pencapaian / $target->target_amount) * 100;
        else:
          $presentase = false;
        endif;



        return view('dashboard', [
          'target' => $target,
          'penjualan' => $penjualan,
          'pencapaian' => $pencapaian,
          'presentase' => $presentase,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellingController extends Controller
{
    public function index()
    {
      return view('selling.sell');
    }
    public function selling_sell_post(Request $request)
    {

    }
}

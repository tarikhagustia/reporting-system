<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salein;
class OrderController extends Controller
{
    public function index()
    {
      $orders = Salein::where('status', 'ordering')->get();
      return view('orders.input', ['orders' => $orders]);
    }
}

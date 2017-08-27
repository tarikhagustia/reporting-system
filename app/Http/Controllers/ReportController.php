<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saleout;
use Carbon\Carbon;
class ReportController extends Controller
{
    //
    public function dayily_sales(Request $request)
    {
      $dateFrom = Carbon::parse($request->dateFrom)->toDateTimeString();
      $dateTo = Carbon::parse($request->dateTo)->toDateTimeString();
      $reports = Saleout::dayily_sales($dateFrom, $dateTo);
      return view('reports.day-sales', [
        "dateFrom" => $dateFrom,
        "reports" => $reports->get()
      ]);
    }
}

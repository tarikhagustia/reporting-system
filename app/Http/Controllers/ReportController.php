<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saleout;
use App\Models\Target;
use Carbon\Carbon;
class ReportController extends Controller
{
    //
    public function dayily_sales(Request $request)
    {
      $dateFrom = Carbon::parse($request->dateFrom)->toDateTimeString();
      $dateTo = Carbon::parse($request->dateTo)->toDateTimeString();
      $reports = Saleout::dayily_sales($dateFrom, $dateTo);
      $target = Target::getTarget();

      $diff = Carbon::parse($request->dateFrom)->diffInDays(Carbon::parse($request->dateTo));

      return view('reports.day-sales', [
        "dateFrom" => $dateFrom,
        "diff" => $diff,
        "dateTo" => $dateTo,
        "reports" => $reports->get(),
        "target" => $target
      ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Saleout extends Model
{
    public static function ambilPencapaian()
    {
      $sql = self::select('products.selling_price', 'saleouts.quantity', DB::raw('selling_price * quantity as sub_total'))->join('products', 'products.id', '=', 'saleouts.product_id');

      return $sql;
    }
    public static function dayily_sales($datefrom,$dateto)
    {
      $datefrom = Carbon::parse($datefrom)->toDateTimeString();
      $dateto = Carbon::parse($dateto)->toDateTimeString();

      $sql = self::select(DB::raw('DATE(saleouts.created_at) as created_at'), DB::raw('SUM(products.selling_price * saleouts.quantity) as dayily_sales'))
      ->join('products', 'products.id', '=' , 'saleouts.product_id')
      ->whereBetween(DB::raw('DATE(saleouts.created_at)'), [DB::raw($datefrom), DB::raw($dateto)])
      ->orderBy(DB::raw('DATE(saleouts.created_at)'), 'ASC')
      ->groupBy(DB::raw('DATE(saleouts.created_at)'));

      // dd($sql->toSql());


      return $sql;


    }

    public function getTotalSalesByDate($dateFrom)
    {
      $ref = DB::table("saleouts")->select(DB::raw('SUM(products.selling_price * saleouts.quantity) as sub_total'))
      ->join('products', 'products.id', '=' , 'saleouts.product_id')
      ->where(DB::raw('DATE(saleouts.created_at)'), '>=', DB::raw("DATE('$dateFrom')"))
      ->where(DB::raw('DATE(saleouts.created_at)'), '<=', DB::raw("DATE('$this->created_at')"));


      $sql = $ref->get()->sum('sub_total');
      return $sql;

    }
    public function getRemainTargetByDate($dateFrom)
    {
      $ref = DB::table("saleouts")->select(DB::raw('SUM(products.selling_price * saleouts.quantity) as sub_total'))
      ->join('products', 'products.id', '=' , 'saleouts.product_id')
      ->where(DB::raw('DATE(saleouts.created_at)'), '>=', DB::raw("DATE('$dateFrom')"))
      ->where(DB::raw('DATE(saleouts.created_at)'), '<=', DB::raw("DATE('$this->created_at')"));


      $sql = $ref->get()->sum('sub_total');

      $target = \App\Models\Target::getTarget();

      $sql = $target->target_amount - $sql;
      return $sql;

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Target extends Model
{
    // Ambil Target untuk bulan ini
    public static function getTarget()
    {
      // SELECT * FROM targets WHERE for_date = DATE(NOW());
      $sql = self::where(DB::raw('MONTH(for_date)'), DB::raw('MONTH(NOW())'))->first();
      if($sql)
      {
        return $sql;
      }else{
        return false;
      }
    }
}

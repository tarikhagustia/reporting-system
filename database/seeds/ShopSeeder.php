<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
          'shop_name' => 'Apotek Seger',
          'shop_address' => 'Cicurug',
          'name' => 'Kokoh'
        ]);
    }
}

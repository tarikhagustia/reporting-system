<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CreateCategoriesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          'Acne Series',
          'Lip Cream'
        ];

        foreach($categories as $key => $row)
        {
          Category::create([
            'category_name' => $row
          ]);
        }
    }
}

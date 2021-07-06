<?php

use App\Category;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP'
        ];
        foreach ($arr as $item) {
           $new_category = new Category();
           $new_category->name = $item;
           $new_category->slug = Str::slug($item,'-');
           $new_category->save();
        }
    }
}

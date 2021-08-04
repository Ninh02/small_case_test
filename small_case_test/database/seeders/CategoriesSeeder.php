<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->id = 1;
        $category->name = 'Văn học';
        $category->save();

        $category = new Category();
        $category->id = 2;
        $category->name = 'Tâm lý';
        $category->save();

        $category = new Category();
        $category->id = 3;
        $category->name = 'Truyện';
        $category->save();

        $category = new Category();
        $category->id = 4;
        $category->name = 'Tiểu thuyết';
        $category->save();


    }
}

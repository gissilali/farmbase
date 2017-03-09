<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
        		['name' => 'Farm Produce'],
        		['name' => 'Livestock,Poultry & Fish'],
        		['name' => 'Farm Machinery'],
        		['name' => 'Feeds & Suppliments'],
        		['name' => 'Agricultural Supplements'],
        	]);
    }
}

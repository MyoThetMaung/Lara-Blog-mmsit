<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['IT News','Sport','Education','Politic'];
        foreach($categories as $cat){
            Category::factory()->create([
                'title' => $cat,
                'slug' => Str::slug($cat), 
                'user_id' => rand(1,10)
            ]);
        }
    }
}

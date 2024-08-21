<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Define the categories you want to add
         $categories = [
            ['name' => 'Technology', 'description' => 'Posts related to technology and gadgets'],
            ['name' => 'Programming', 'description' => 'Posts about programming and software development'],
            ['name' => 'Design', 'description' => 'Posts on design, UI/UX, and graphic design'],
            ['name' => 'Business', 'description' => 'Posts about business, startups, and entrepreneurship'],
            ['name' => 'Health', 'description' => 'Posts on health, wellness, and fitness'],
        ];

        // Insert the categories into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

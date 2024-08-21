<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tags = [
            'Technology',
            'Programming',
            'Web Development',
            'Design',
            'Laravel',
            'JavaScript',
            'PHP',
            'CSS',
            'HTML',
            'React'
        ];

        // Insert each tag into the database
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}

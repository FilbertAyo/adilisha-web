<?php

namespace Database\Seeders;

use App\Models\WorkshopTag;
use Illuminate\Database\Seeder;

class WorkshopTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Education',
            'Technology',
            'Leadership',
            'Skills Development',
            'Career Guidance',
            'Mentorship',
            'Youth Empowerment',
            'Life Skills',
            'Entrepreneurship',
            'STEM',
            'Arts & Creativity',
            'Communication',
            'Team Building',
            'Problem Solving',
            'Financial Literacy',
            'Digital Skills',
            'Public Speaking',
            'Innovation',
            'Community Service',
            'Personal Development',
        ];

        foreach ($tags as $tagName) {
            WorkshopTag::firstOrCreate(['name' => $tagName]);
        }
    }
}

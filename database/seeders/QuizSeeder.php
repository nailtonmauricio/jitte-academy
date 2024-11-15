<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Quiz::where('id', 1)->exists()) {
            Quiz::create([
                'course_id' => 1,
            ]);
        }

        if (!Quiz::where('id', 2)->exists()) {
            Quiz::create([
                'course_id' => 2,
            ]);
        }

        if (!Quiz::where('id', 3)->exists()) {
            Quiz::create([
                'course_id' => 3,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();
        $skills = [
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'Mysql'],
            ['name' => 'NodeJs'],
            ['name' => 'ReactJs'],
        ];
        Skill::insert($skills);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use App\Models\Project;
use App\functions\Helper;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

      for($i=0; $i<100; $i++){
        $new_project= new Project();
        $new_project->title = $faker->sentence();
        $new_project->slug = Helper::getSlug($new_project->title, Project::class);
        $new_project->text = $faker->paragraphs(3, true);
        $new_project->save();


      }
    }
}

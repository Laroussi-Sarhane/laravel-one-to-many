<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\functions\Helper as Help;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data=['front-end', 'back-end', 'Design', 'ux', 'iux'];

        foreach($data as $item){
            $new_item= new Type();
            $new_item-> name =$item;
            $new_item-> slug = Help::getSlug($item, Type::class);
            $new_item->save();

        }

    }
}

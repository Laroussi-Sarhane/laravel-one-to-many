<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnology;
use App\functions\Helper as Help;


class TecnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=['HTML', 'CSS', 'JS', 'LARAVEL'];
        foreach($data as $item){
            $new_item= new Tecnology();
            $new_item-> name =$item;
            $new_item-> slug = Help::getSlug($item, Tecnology::class);
            $new_item->save();



        }
    }
}

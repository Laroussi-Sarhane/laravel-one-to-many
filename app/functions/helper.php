<?php
namespace App\functions;
use Illuminate\Support\Str;


class Helper{
    public static function getSlug($string, $model)
    {
        $slug = Str::slug($string);


        $count = $model::where('slug', $slug)->count();

        if ($count > 0) {

            $i = 1;
            while ($model::where('slug', $slug . '-' . $i)->count() > 0) {
                $i++;
            }
            $slug .= '-' . $i;
        }

        return $slug;
    }
}

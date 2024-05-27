<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class project extends Model
{
    use HasFactory;

    //  protected $fillable= ['title', 'slug'];
    public function project(){
        return $this->belongsTo(Project::class)

    }
}

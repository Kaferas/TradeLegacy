<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded;

    public function posts()
    {
        return $this->hasMany(Articles::class,'categorie_id')->where('deleted_status',0)->where("is_published",'on');
    }

}

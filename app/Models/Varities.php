<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varities extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
public function getvarityphoto(){
    return $this->image?asset('uploads/varities/'.$this->image):null;
}

    //
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function varities(){
        return $this->hasMany(Varities::class,'category_id');
    }
    public function getcategoryphoto(){
        return $this->image?asset('uploads/category/'.$this->image):null;
    }
    //
}

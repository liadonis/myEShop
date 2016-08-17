<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
//    protected $table = "categories";
    protected $fillable = ["cate_name","created_at_ip","updated_at_ip"];
}

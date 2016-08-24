<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends BaseModel
{
    //允許讓orm 寫入資料的表格名稱
    protected $fillable = [
      'vendor','vendor_user_id','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

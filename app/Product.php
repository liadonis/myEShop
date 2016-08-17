<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $table = "products"; //更改對應的資料表名稱

//    protected $table = "categories"; //更改對應的資料表名稱
    protected $primaryKey = "id"; //設定所對應的主鑑

//    protected $timestamps = false; //取消系統預設的寫入新增及更新時間

    protected $fillable = ["pro_name","pro_title"]; //若routes使用create方式寫入資料要在這裡加上這一行,有寫的才會寫入

//    protected $fillable = ["cate_name"];
}

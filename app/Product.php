<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
//    protected $table = "products"; //更改對應的資料表名稱


//    protected $primaryKey = "id"; //設定所對應的主鑑

//    protected $timestamps = false; //取消系統預設的寫入新增及更新時間

    protected $fillable = ["pro_name","pro_title","pro_detail","pro_price","cate_id","brand_id","created_at_ip","updated_at_ip"]; //若routes使用create方式寫入資料要在這裡加上這一行,有寫的才會寫入


//    //=============測試寫入其他table==============
//    protected $table = "categories"; //更改對應的資料表名稱
//    protected $fillable = ["cate_name"];
//    //==========================================
}

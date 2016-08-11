<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function selectQuery($sql_select)
    {
        return DB::select($sql_select);
    }

    public function sqlStatement($sql_statement)
    {
        DB::statement($sql_statement);
    }
}

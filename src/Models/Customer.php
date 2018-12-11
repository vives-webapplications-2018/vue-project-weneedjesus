<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    public function trim($item)
    {
        $replaced = $item_replaceAll("\\s+", "", " ");
        $trimmed = !empty($replaced) ? trim($replaced) : null;
        return $trimmed;
    }

}

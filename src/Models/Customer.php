<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    public function cleanup($item)
    {
        $trimmed = !empty($item) ? trim($item) : null;
        return $trimmed;
    }

}

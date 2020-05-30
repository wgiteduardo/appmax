<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'sku';
    protected $keyType = 'string';

    public $incrementing = false;
}

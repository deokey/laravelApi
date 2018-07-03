<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = array('name', 'price', 'stock');
    public $timestamps = false;
}

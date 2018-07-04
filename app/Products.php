<?php

namespace Api;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /*Example not using the convention to create the model; using Product instead of Product on the command php artisan make:model Product , eloquent (supongo que es el motor de configuracion de bd) will assume that you have a table named products (lowercase and plural) and it will do the whole connection*/
    protected $table = 'products';
    protected $fillable = array('name', 'price', 'stock');
    public $timestamps = false;
}

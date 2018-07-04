<?php

namespace Api;

use Api\Product;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps(); //for convention, belongsToMany() searches on DB a table named like the two related models Invoice and Product ordered alphabeticaly so it should be invoice_product and also search a column (foreign key) in each related table (invoices and products) that has the format 'product_id' 'invoice_id'
    }
}

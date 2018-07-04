<?php

namespace Api;

use Api\Invoice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'stock',
    ];

    //if you delete the timestamp on the migration of this migration you must specify this line
    public $timestamps = false;

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withTimestamps(); //for convention, belongsToMany() searches on DB a table named like the two related models Invoice and Product ordered alphabeticaly so it should be invoice_product and also search a column (foreign key) in each related table (invoices and products) that has the format 'product_id' 'invoice_id'
    }
}

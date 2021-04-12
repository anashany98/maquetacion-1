<?php

namespace App\Models\DB;

class Stock extends DBModel
{

    protected $table = 't_stock';
    
    public function category()
    {
        return $this->belongsTo(Stock::class);
    }
}
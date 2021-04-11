<?php

namespace App\Models\DB;

class Stock extends DBModel
{

    protected $table = 'stock_table';
    
    public function category()
    {
        return $this->belongsTo(Stock::class);
    }
}
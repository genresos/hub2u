<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use dateTimeInterface;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'id_product',
        'nama_barang',
        'id_category',
        'uom',
        'stok',
        ];
	protected $guarded  = ['created_at', 'updated_at']; 
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}

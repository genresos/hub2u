<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use dateTimeInterface;
class Budgeting extends Model
{
    protected $primaryKey = 'id_budget';
    protected $fillable = [
        'id_budget',
        'jenis_laporan',
        'id_product',
        'id_category',
        'qty',
        'act_stok',
        'remark',
        'status',
        'user_id',
        ];
	protected $guarded  = ['created_at', 'updated_at']; 
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

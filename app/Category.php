<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 
	protected $primaryKey = 'id_category';
	protected $guarded  = ['created_at', 'updated_at']; 
}

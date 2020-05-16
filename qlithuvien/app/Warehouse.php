<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	protected $table='warehouse';
    protected $fillable = ['username', 'id_item', 'qty_item', 'created_at', 'updated_at'];
    // public $timestamps = true;
}

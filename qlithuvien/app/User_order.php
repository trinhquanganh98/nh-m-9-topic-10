<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_order extends Model
{
	protected $table='user_order';
    protected $fillable = ['user_id', 'user_borrow', 'user_classification'];
    public $timestamps = true;
}

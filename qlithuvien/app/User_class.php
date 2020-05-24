<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_class extends Model
{
	protected $table='user_class';
    protected $fillable = ['classification_name', 'can_borrow'];
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_book extends Model
{
	protected $table='user_book';
    protected $fillable = ['user_id', 'book_id', 'status', 'date_back', 'created_at', 'updated_at'];
    // public $timestamps = true;
}

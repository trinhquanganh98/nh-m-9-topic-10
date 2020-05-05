<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table='gallery';
    protected $fillable = ['image_url', 'image_name'];
    public $timestamps = true;
}

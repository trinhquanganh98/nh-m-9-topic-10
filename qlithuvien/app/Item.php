<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table='items';
    protected $fillable = ['category_id', 'book_name', 'book_image', 'book_view', 'book_writer', 'book_status', 'book_detail', 'book_amount', 'book_borrow'];
    public $timestamps = true;
}

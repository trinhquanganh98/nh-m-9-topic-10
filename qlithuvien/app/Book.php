<?php

namespace App;

class Book
{
	public $items = null;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
		}
	}
	public function add($item){
        $id = $item->book_id;
        $this->items = ['id' => $id];
    }
}

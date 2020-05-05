<?php

namespace App;

class Customer
{
	public $customer = null;

	public function __construct($customer){
		if($customer){
			$this->customer = $customer;
		}
	}

    public function Create($item){
        $id = $item->id;
        $username = $item->name;
        $email = $item->email;
        $data = ['id'=>$id, 'username' => $username, 'email' => $email];
        $this->customer = $data;
    }
}

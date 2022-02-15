<?php

class Facade{
	protected $pass;
	public function __construct(){
		$this->pass=$validate = new validate();
	}
	public function hashPassword($value){
		$validate = $this->pass->passwordValidate($value);
		$password = new PasswordHash();
		echo $password->hashing($validate);
	}
}
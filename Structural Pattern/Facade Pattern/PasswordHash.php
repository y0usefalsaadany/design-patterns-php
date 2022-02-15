<?php

class PasswordHash{
	public function hashing($validate){
		$hash = md5($validate);
		return $hash."\n";
	}
}
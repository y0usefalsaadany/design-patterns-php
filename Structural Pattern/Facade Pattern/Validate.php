<?php
class Validate{
	public function passwordValidate($vlaue){
		$pass = trim($password);
		$pass = htmlspecialchars($pass);
		return $pass;
	}
}
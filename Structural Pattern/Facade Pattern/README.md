#facade pattern

Let's say you want to work
validation
Enter the user's password, then hash it and store it in the database

But what do you think if you make a class that does all this you just give it the password
This is the idea of ​​a facade pattern that saves you from doing a lot of tasks

In this example, we will do a validation for the password and then we will make a hash for it. We will not add it to the database so that the example does not become complicated. The purpose is to clarify the idea of ​​the facade pattern.

Let's create a Validate.php file
```
<?php
class Validate{
public function passwordValidate($vlaue){
$pass = trim($password);
$pass = htmlspecialchars($pass);
return $pass;
}
}
```

Then let's create PasswordHash.php
```
<?php

class PasswordHash{
public function hashing($validate){
$hash = md5($validate);
return $hash."\n";
}
}
```

Then we make a file facade.php
```
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
```

Now if the developer wants to make a hash of the password, he just makes an object from the facade and then puts the password he wants
for example:
```
$test = new Facade();
$test->hashPassword("yousef2020");
```
The output of this code is
```
d41d8cd98f00b204e9800998ecf8427e
```
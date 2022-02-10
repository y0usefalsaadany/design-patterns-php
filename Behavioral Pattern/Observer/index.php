<?php
spl_autoload_register(function ($class){
  require($class .".php");
});
$new_post = 'hello this post for developers ';
$date = "9/2/2022";
$addedPost = new AddPost($new_post, $date); 
$addedPost->attach(new Post())
	->attach(new PostNumbers())
	->notify();
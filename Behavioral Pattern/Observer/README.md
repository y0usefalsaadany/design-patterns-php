# observer pattern 
This mode acts as an observer
As it connects several functions belonging to something, when this thing occurs, it implements those functions associated with it

# Example:
We have a database for users. When the user publishes a post, this observer fetches the data of this person from the database and puts it in this post.
For example, a user named Youssef publishes a post, the observer will send a notification to the rest of the users that there is a new post from Youssef and fetch the user data Youssef and put it On the post, such as the username, which is Youssef, and the number of posts he posted


# Using the observer pattern with php

Fortunately, we have two php interfaces to use this pattern:
SplSubject
SplObserver


# 1- SplObserver

Contains one method:
update

In this method we will write the function we want to happen when the user publishes a post

```
interface SplObserver{
  public function update(SplSubject $subject);
}
?>
```
# SplSubject

Contains 3 method
attach
detach
notify

attach method: 
Through this function, we will be able to run the update function in the SplObserver interface.

detach method:
This method is used to separate a user from the observer so that it does not call things that are associated with this user

notify method:
We use this function to send a notification to other users when a user publishes a post

```
<?php
interface SplSubject{
  public function attach(SplObserver $observer);
  public function detach(SplObserver $observer);
  public function notify();
}
?>
```

# Implementation observer pattern

Now we will implement the previous example using the observer pattern
We make a class called
AddPost
We inherit from the SplSubject interface
And jokes the three basic functions of this interface
Then we make a property and call it observers and make it private and be of type array

We call the properties we will use to implement our example and make them public like:
$number_of_posts
$post_content
$post_date
$account_name
Then we make our constructor

```
<?php

class AddPost implements SplSubject
{
    private $observers = [];
    public $number_of_posts = 12;
    public $post_content;
	  public $post_date;
  	public $account_name = "yousef alsaadany";
    public function __construct($postContent,$postDate)
    {
        $this->post_content = $postContent;
        $this->post_date = $postDate;
    }
  
    public function attach(SplObserver $observer)
    {
        $key = spl_object_hash($observer);
        $this->observers[$key] = $observer;
        return $this;
    }
    
    public function detach(SplObserver $observer)
    {
        $key = spl_object_hash($observer);
        unset($this->observers[$key]);
    }

    public function notify()
    {
    	echo "<h1 STYLE='color:#4a7fdf'>A new post was posted by : ".$this->account_name. " content :</h1><BR>";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
```

Now we will do two classes
1- Post
2- PostNumbers
We implementation them from the SplObserver interface
Then we put in an update method what we want to execute

Post.php
```
<?php

class Post implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "<p>name : ". $subject->account_name . 
" <br>date : " . $subject->post_date ."</p><h2>content : ". $subject->post_content . "</h2>";
    }
}
```

PostNumbers.php
```
<?php

class PostNumbers implements SplObserver
	{
    public function update(SplSubject $subject)
    {
        echo "<p STYLE='color: green'>The number of posts that {". $subject->account_name."} has published : ". $subject->number_of_posts ."</p>";
    }
}
```

Now let's create an index.php file to implement this pattern

index.php
```
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
```

The outputs of this code are:
```
A new post was posted by : yousef alsaadany content :

name : yousef alsaadany 
date : 9/2/2022
content : hello this post for developers 

The number of posts that {yousef alsaadany} has published : 12
```
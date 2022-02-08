<?php

class AddPost implements SplSubject
{
    private $observers = [];
    public $number_of_posts = 12;
    public $post_content;
	public $post_date;
	public $account_name = "yousef alsaadany";
    public function __construct($post_content,$post_date)
    {
        $this->post_content = $post_content;
        $this->post_date = $post_date;
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
    	echo "A new post was posted by : ".$this->account_name. " content :\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class Post implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "name : ". $subject->account_name . 
" \ndate : " . $subject->post_date ."\ncontent : ". $subject->post_content . "\n";
    }
}
class PostNumbers implements SplObserver
	{
    public function update(SplSubject $subject)
    {
        echo "The number of posts that {". $subject->account_name."} has published : ". $subject->number_of_posts ."\n";
    }
}

$new_post = 'hello this post for developers ';
$date = "9/2/2022";
echo "Adding observers to subject\n";
$addedPost = new AddPost($new_post, $date); 
$addedPost->attach(new Post())
	->attach(new PostNumbers())
	->notify();
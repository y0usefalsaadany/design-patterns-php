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
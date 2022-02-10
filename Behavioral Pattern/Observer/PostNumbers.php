<?php

class PostNumbers implements SplObserver
	{
    public function update(SplSubject $subject)
    {
        echo "<p STYLE='color: green'>The number of posts that {". $subject->account_name."} has published : ". $subject->number_of_posts ."</p>";
    }
}
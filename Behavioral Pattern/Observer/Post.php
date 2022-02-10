<?php

class Post implements SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "<p>name : ". $subject->account_name . 
" <br>date : " . $subject->post_date ."</p><h2>content : ". $subject->post_content . "</h2>";
    }
}
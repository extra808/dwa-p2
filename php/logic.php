<?php

$words = Array("alice", "bob", "curtis");


function random_word(&$wordArray) {
    return  $wordArray[rand(0,count($wordArray)-1 )];
}

$randomWord = random_word($words);

?>
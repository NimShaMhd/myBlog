<?php
    //format the date
    function formatDate($date){
        return date("g:i a, j F Y ",strtotime($date));
    
    }

    //format body to make it short
    function shortenText($text, $chars=450){
        $text=$text." ";
        $text=substr($text,0,$chars);
        $text=substr($text,0,strrpos($text,' '));
        $text=$text."...";
        return $text;
    }
?>

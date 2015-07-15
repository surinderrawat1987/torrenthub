<?php
$date=date("H:i");
echo $text = file_get_contents(stripslashes(utf8_decode('https://kat.cr/movies/?rss=1')));
//echo $string = mb_convert_encoding($text,'HTML-ENTITIES','utf-8');

//file_put_contents("movie1.xml",$text);
?>
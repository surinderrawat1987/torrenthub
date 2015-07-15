<?php
//http://torcache.net/torrent/FE9A2245642274D635CAB12972EC088B09106CD7.torrent?title=[kat.cr]mad.max.fury.road.2015.1080p.web.dl.dd5.1.h264.rarbg
$file_url = "http://torcache.net/torrent/".$_GET[hash].".torrent";
//echo basename($file_url);
header('Content-Type: application/octet-stream');
header("Content-disposition: attachment; filename=\"" . basename($file_url)); 
header("Content-Transfer-Encoding: Binary"); 
readfile($file_url);
?>

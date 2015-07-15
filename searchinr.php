<?php
$hash=$_GET[torrent];
$jsoncontent=file_get_contents("https://getstrike.net/api/v2/torrents/info/?hashes=".$hash);
$priceusd=json_decode($jsoncontent,true);
foreach ($priceusd['torrents'] as $key => $jsons) {
    $imdb=$jsons[imdbid];

}
if($imdb!=''){
$jsoncontent1=file_get_contents("http://www.omdbapi.com/?i=".$imdb."&plot=short&r=json");
$priceusd1=json_decode($jsoncontent1, true);
$priceusd1[Year]; 



?>
<table border="0" width="70%">
<tr>
<td width="200"><img src="<?php echo $priceusd1[Poster];?>" width="150px"></td>
<td valign="top"> 
<table border="0" width="70%">
<tr>
<td>Name:</td><td><?php echo $priceusd1[Title];?></td></tr>
<tr>
<td>Released Date:</td><td><?php echo $priceusd1[Released];?></td></tr>
<tr>
<td>Genre:</td><td><?php echo $priceusd1[Genre];?></td></tr>
<tr>
<td>Writer:</td><td><?php echo $priceusd1[Genre];?></td></tr>
<tr>
<td>Rating:</td><td><?php echo $priceusd1[imdbRating];?></td></tr>
</tr>
</table>
</td>
</table>
<?php }?>

<br><img src="download.png"></td>

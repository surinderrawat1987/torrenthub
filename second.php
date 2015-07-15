 <?php

	 $dbhost = 'localhost';
	$dbname = 'torrents';

	// Connect to test database
	$m = new Mongo("mongodb://$dbhost");
	$db = $m->$dbname;

	$c_users = $db->tdata;
$hash=$_GET[torrent];
$user22 = $c_users->find(array('t_hash'=>$hash));
    

$jsoncontent=file_get_contents("https://getstrike.net/api/v2/torrents/info/?hashes=".$hash);
$priceusd=json_decode($jsoncontent,true);
foreach ($priceusd['torrents'] as $key => $jsons) {
    $imdb=$jsons[imdbid];
 $upuser=$jsons['uploader_username'];
  $u=$jsons['magnet_uri']; 
  $tfiles=$jsons['file_info']; 
}


if($imdb!=''){
$jsoncontent1=file_get_contents("http://www.omdbapi.com/?i=".$imdb."&plot=full&r=json");
$priceusd1=json_decode($jsoncontent1, true);
$priceusd1[Year]; 
}
foreach ($user22 as $obj)
        {

$a=$obj['t_category'];
$b=$obj['size'];
$c=$obj['seaders'];
$d=$obj['leachers'];
$e=$obj['upload_date'];
$f=$obj['t_download'];
$a1=$obj['torrent_name'];

		}
$tfile=str_replace($a1."\\","",$tfiles[file_names]);


$g12=$priceusd1[torrent_category]; 

$g=$priceusd1[Year]; 
$i=$priceusd1[Released]; 
$j=$priceusd1[Genre]; 
$k=$priceusd1[imdbRating]; 
$l=$priceusd1[Director]; 
$m=$priceusd1[Writer]; 
$n=$priceusd1[Actors]; 
$o=$priceusd1[Plot]; 
$p=$priceusd1[Language]; 
$q=$priceusd1[Country]; 
$r=$priceusd1[Type]; 
$s=$priceusd1[Poster]; 
$t=$priceusd1[Title]; 

//echo str_replace(",","tr=",$magnet);
	$time = date("d'M Y",$e);
  $mb11=round($b/1048576,2);
  $bytes = number_format($b / 1048576, 2) . ' MB';
 	if($mb11>'1024'){

	$mb1 = number_format($b / 1073741824, 2) . ' GB';  
	}
	else{
		$mb1=$bytes;
	}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mockup</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
</head>

<body>
<section id="content" class="center-block">
	<div class="container">
    	<!-- left content div-->
        
        	<div class="col-lg-9 col-md-9 col-sm-12">
                <div class="row">
                    <div class="top-section">
                    <span class="txt"><?php echo $a1;?></span> 
                    <ul class="like-dis">
                        <li><a href="#"><img src="images/like-hand.png" alt="like" /> <span class="like-box">2</span></a></li>
                        <li><a href="#"><img src="images/dislike-hand.png" alt="like" /> <span>2</span></a></li>
                    </ul>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 no-padding_l">
                        <div class="left-inner">
						<?php 
						if(isset($s)){
                            echo "<img src='$s' alt='$t' width='150px' height='170px'/>";
			}
			else{
            echo "<img src='images/no-img.jpg' alt='<?php echo $t;?>' width='150px' height='170px'/>";
			}
			?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 no-padding_r">
                        <div class="right-inner">
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <ul class="mylist">
                                    <li>Category:<span><?php echo $a;?></span></li>
									<li>Seaders:<span><?php echo $c;?></span></li>
                                    <li>Total size:<span><?php echo $mb1;?></span></li>
									
								<?php
					if($imdb!=''){
						?>	
									<li>Type:<span><?php echo $r;?></span></li>
                                   <li>Language:<span><?php echo $p;?></span></li>
								<li>Director's:<span class="last-list"><?php echo $l;?></span></li>
						<?php }?>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <ul class="mylist">
								<li>Date Upload:<span><?php echo $time;?></span></li>
                                    
                                    <li>Leachers:<span><?php echo $d;?></span></li>
                                     
									  <li>Uploaded by:<span><?php echo $upuser;?></span></li>
						<?php
					if($imdb!=''){
						?>
                                    <li>Released Date:<span><?php echo $i;?></span></li>
									
									<li>IMDB Rating:<span><?php echo $k;?></span></li>
                                    <li>IMDB LINK:<span class="last-list"><a href="http://www.imdb.com/title/<?php echo $imdb;?>/" target="_blank"><?php echo $imdb;?></a></span></li>
                        <?php }?>        
                                </ul>
                            </div>
                         
                        </div>

                    </div>
   <div class="col-lg-8 col-md-4 col-sm-12">
                                <ul class="mylist1">
                                <li><a data-nop="" title="Magnet link" href="<?php echo $u;?>" class="mgnt-btn"> magnet download</a></li>
                                    <li><a href="https://torrage.com/torrent/<?php echo $hash;?>.torrent" class="dwnlod-btn"> Direct download</a></li>
                                    <li><a href="https://torrage.com/torrent/<?php echo $hash;?>.torrent" class="torrnt-btn"> Torrent download</a></li>
                                </ul>
                            </div>
                </div>

				<div class="row">
				<?php
					if($imdb!=''){
						?>
                	 <span class="heading">Summary:</span>
                     <p class="para"><?php echo $o;?></p>
                     <span class="heading">Actor's: <span><?php echo $n;?></span></span>
					 <span class="heading">Written By: <span><?php echo $m;?></span></span>
					<span class="heading">Files: <span><?php 
echo $a1;
echo "<br>";
foreach ($tfile as $obj1)
        {
	echo "<ul><li>";
echo $obj1;
echo "</li></ul>";
		}

						?></span></span>

                     <span class="heading"><a href="#" class="mybtn">! Report Summary</a></span>
					 <?php }?>
                     <span class="heading">Availabe in versions</span>
                     <ul class="versions">
                     	<li><a href="#" class="active-m">1080p</a></li>
                        <li><a href="#">720p</a></li>
                       <li><a href="#">bdrip</a></li>
                       <li><a href="#">hdrip</a></li>
                       <li><a href="#">dvdrip</a></li>
                     </ul>
                </div>
                <span class="main-head">People who  liked  this also liked...</span>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 center ">
                    	<img src="images/img1.png" alt="img1" />
                        <span class="ppl-txt"><a href="#">lorum ipsusm</a></span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 center">
                    	<img src="images/img2.png" alt="img1" />
                        <span class="ppl-txt"><a href="#">lorum ipsusm</a></span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 center">
                    	<img src="images/img3.png" alt="img1" />
                        <span class="ppl-txt"><a href="#">lorum ipsusm</a></span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 center">
                    	<img src="images/img4.png" alt="img1" />
                        <span class="ppl-txt"><a href="#">lorum ipsusm</a></span>
                    </div>
                </div>
                <div class="row">
                <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'Torrent';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'saraestore';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
<BR><BR>
<a href="<?php the_permalink(); ?>#disqus_thread">Comments</a>

<a href="<?php comments_link(); ?>"><?php comments_number();?>fsd</a>
                       
                   
                  
                </div>
            </div>
        <!-- left content end here-->
        
        <!--sidebar-->
        <div class="col-lg-2 col-md-3 col-sm-12 no-padding_l">
        	<ul class="sidebar">
            	<li class="side-head">Browse torrents</li>
            	<li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
                <li>Lorum ipsusm</li>
            </ul>
        </div>
        <!-- sidebar end here-->
    </div>
</section>


<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/npm.js" type="text/javascript"></script>
</body>
</html>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
<!-- Fonts END -->

<!-- Global styles START -->
<link href="css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link href="css/dataTables.bootstrap.css" rel="stylesheet">
<link href="css/custome.css" rel="stylesheet">
</head>

<body>
<div class="pre-header">
  <div class="container">
    <div class="row"> 
      <!-- BEGIN TOP BAR LEFT PART -->
      <div class="col-md-6 col-sm-6 additional-shop-info">
        <ul class="list-unstyled list-inline">
          <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
          <li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
        </ul>
      </div>
      <!-- END TOP BAR LEFT PART --> 
      <!-- BEGIN TOP BAR MENU -->
      <div class="col-md-6 col-sm-6 additional-nav">
        <ul class="list-unstyled list-inline pull-right">
          <li><a href="page-login.html">Log In</a></li>
          <li><a href="page-reg-page.html">Registration</a></li>
        </ul>
      </div>
      <!-- END TOP BAR MENU --> 
    </div>
  </div>
</div>
<div class="header">
  <div class="container"> <a class="site-logo" href="index.html"> <img alt="logo" src="images/logo.png"> </a> <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a> 
    
    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation pull-right font-transform-inherit">
      <ul>
        <li><a href="javascript:;">Administrator</a></li>
        <li><a href="javascript:;">Moderator</a></li>
        <li><a href="javascript:;">VIP</a></li>
      </ul>
    </div>
    <!-- END NAVIGATION --> 
    
  </div>
</div>
<div class="container-fluid "> 
  
  <!-- BEGIN SIDEBAR & CONTENT -->
  <div class="row margin-bottom-40 bg-blue-line"> 
    <!-- BEGIN CONTENT -->
	           		 <form role="form" action="index.php" method="POST" class="form-inline">

    <div class="container">
      <div class="col-md-12">
        <div class="content-page">
          <div class="col-md-10  p-adding">
           <div class="form-group">
     
           
            <input type="text" placeholder="search" name="search" value="<?php echo $_POST[search];?>" class="form-control input-lg">
         
           
           
               <select class="form-control input-lg" name="cat">
				  <option value="All" selected>All</option>
			       <option>Movies</option>
                  <option>XXX</option>
                  <option>Games</option>
                  <option>Books</option>
                  <option>TV</option>
				  <option>Music</option>
				  <option>Anime</option>
				  <option>Other</option>
				  <option>Hot</option>
				 

                </select>
              <button class="btn pay" name="Submit" value="Submit" type="submit"><i class="fa fa-search mgr"></i>Search</button>
            </div>
          </div>
          <div class="col-md-2">
            <button class="btn btn-danger pay-1" type="button">Danger</button>
          </div>
        </div>
      </div>
    </div></form>
    <!-- END CONTENT --> 
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="col-lg-9">
       
        <ul class="nav nav-tabs">
             <li class="active"><a data-toggle="tab" href="#home">Torrents</a></li>
    <li><a data-toggle="tab" href="#menu1">Games</a></li>
    <li><a data-toggle="tab" href="#menu2">Movie</a></li>
    <li><a data-toggle="tab" href="#menu3">Songs</a></li>
         
        </ul>
       
          <div class="col-md-12"><div class="row">
         <div class="tab-content">
         
            <div class="table-responsive tab-pane fade in active" id="home"> 
              <div class="row">
                             </div>
            <?php
			if(isset($_GET[page])){
				$_POST[search]=$_GET[q];
			$_POST[cat]=$_GET[cat];
			}
//if(!empty($_POST['search'])){
// Configuration
	 $dbhost = 'localhost';
	$dbname = 'torrents';

	// Connect to test database
	$m = new Mongo("mongodb://$dbhost");
	$db = $m->$dbname;

	// Get the users collection
	$c_users = $db->torrents;
 $cat=$_POST[cat];
  $c_users->ensureIndex(array('torrent_name' => 'text'));

	// Find the user with first_name 'MongoDB' and last_name 'Fan'
	//$user = $c_users->find({"torrent_category": /XXX/});
	$regex = new MongoRegex("/".$_POST[search]."/i");


//$collection->find(array('torrent_category' => $regex));
if(empty($_POST['search'])){
//$user11 = $c_users->find(array('update_date'=>-1));
$timestamp=date('Y-m-d');
$items6 = strtotime($timestamp);
//$user11 = $c_users->find(array('update_date'=>-1));
$user22 = $c_users->find(array('upload_date'=>array('$lt'=>"".$items6."")));

$user111 = $user22->sort(array('update_date'=>-1));
$user = $user111->limit(20);
}
else{
if($cat=="All"){

$user11 = $c_users->find(array('$text'=>array('$search'=>$_POST['search'])));
//$user11 = $user22->sort(array("criteria"=>-1));

//$user = $c_users->find(array('torrent_name' => $regex));
}
else{
	$user11= $c_users->find(array('torrent_category' => $cat,'$text'=>array('$search'=>$_POST[search])));
}
 $length = $user11->count();

$pgnum=$length/10;
//$pgnum=ceil($pgnum1);
$pg=$_GET[page]*10;
$user = $user11->skip($pg)->limit(10);
}

?>
<table class="table">
                <thead>
                  <tr>
                    <th class="bdr">Total Torrents <?php echo  $length;?></th>
					<th class="bdr">Size</th>

                     <th class="bdr">Ratio</th>
                    <th class="">Hits</th>
                  </tr>
                </thead>
                <tbody>
<?php

	foreach ($user as $obj)
        {
		$size=$obj[size];

		 $mb11=round($size/1048576,2);
  $bytes = number_format($size / 1048576, 2) . ' MB';
 	if($mb11>'1024'){

	$mb1 = number_format($size / 1073741824, 2) . ' GB';  
	}
	else{
		$mb1=$bytes;
	}
$c_users1 = $db->comments;
	$thash = $c_users1->find(array('pid' => $obj[torrent_hash]));
$cmess = $thash->count();
?>
	<tr>
                   <td class="pad" width="80%">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="bdr" width="80%"><a href='spage/second.php?torrent=<?php echo $obj[torrent_hash];?>'><?php echo $obj[torrent_name];?></a></td>
						   <td width="20%" class="bdr"><span class="comment"><i class="fa fa-comment"></i>2</span></td>
                        </tr>
                     </table>
                      </td>
					<td width="15%" class="bdr"><span><?php echo $mb1;?></span></td>

                      <td class="pad" width="30%"> 
					  <table width="100%">
                        <tr>
                          <td class="bdr" width="50%" height="100%"><?php echo $obj[seaders];?></td>
                           <td class="bdr" width="50%" height="100%"><?php echo $obj[leachers];?></td>
                        </tr>
                     </table></td>
                    <td class="bdr-padding" width="10%"><?php echo $obj[file_count];?></td>
                  </tr>
          <?php }?>  
                  
                  
                  
                </tbody>
              </table>
            </div>
            <div id="menu1" class="tab-pane fade">

<?php 
if(!empty($_POST['search'])){

$user1 = $c_users->find(array('torrent_category' => 'Games','$text'=>array('$search'=>$_POST[search])));
	
//$user1 = $c_users->find(array('torrent_name' => $regex,'torrent_category' => 'Games'));
				$length1 = $user1->count();
/*
$pgnum=$length1/10;
$pg=$_GET[page]*10;
$user1a = $user1->skip($pg)->limit(10);

*/				
				?>
<table class="table">
                <thead>
                  <tr>
                    <th class="bdr">Total Games Torrents <?php echo  $length1;?></th>
                     <th class="bdr">Ratio</th>
                    <th class="">Hits</th>
                  </tr>
                </thead>
                <tbody>
<?php
foreach ($user1 as $obj1)
        {
	?>
<tr>
                   <td class="pad" width="80%">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="bdr"><a href='second.php?torrent=<?php echo $obj[torrent_hash];?>'><?php echo $obj1[torrent_name];?></a></td>
						   <td width="10%" class="bdr"><span class="comment"><i class="fa fa-comment"></i>2</span></td>
                        </tr>
                     </table>
                      </td>
                      <td class="pad" width="30%"> 
					  <table width="100%">
                        <tr>
                          <td class="bdr"><?php echo $obj1[seaders];?></td>
                           <td class="bdr"><?php echo $obj1[leachers];?></td>
                        </tr>
                     </table></td>
                    <td class="bdr-padding" width="10%"><?php echo $obj1[file_count];?></td>
                  </tr>
          <?php }?>  

  
                </tbody>
              </table>

	</div>
    <div id="menu2" class="tab-pane fade">
<?php 
		$user2 = $c_users->find(array('torrent_category' => 'Movies','$text'=>array('$search'=>$_POST[search])));
	
	$length2 = $user2->count();

/*$pgnum=$length2/10;
$pg=$_GET[page]*10;
$user2a = $user2->skip($pg)->limit(10);
*/
	?>
      <table class="table">
                <thead>
                  <tr>
                    <th class="bdr">Total Movies Torrents <?php echo  $length2;?></th>
                     <th class="bdr">Ratio</th>
                    <th class="">Hits</th>
                  </tr>
                </thead>
                <tbody>
<?php
foreach ($user2 as $obj2)
        {
	?>
<tr>
                   <td class="pad" width="80%">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="bdr"><a href='second.php?torrent=<?php echo $obj[torrent_hash];?>'><?php echo $obj2[torrent_name];?></a></td>
						   <td width="10%" class="bdr"><span class="comment"><i class="fa fa-comment"></i>2</span></td>
                        </tr>
                     </table>
                      </td>
                      <td class="pad" width="30%"> 
					  <table width="100%">
                        <tr>
                          <td class="bdr"><?php echo $obj2[seaders];?></td>
                           <td class="bdr"><?php echo $obj2[leachers];?></td>
                        </tr>
                     </table></td>
                    <td class="bdr-padding" width="10%"><?php echo $obj2[file_count];?></td>
                  </tr>
          <?php }?>  

  
                </tbody>
              </table>
    </div>
    <div id="menu3" class="tab-pane fade">

<?php 
	
	$user3 = $c_users->find(array('torrent_category' => 'Music','$text'=>array('$search'=>$_POST[search])));

				$length3 = $user3->count();

/*$pgnum=$length3/10;
$pg=$_GET[page]*10;
$user3a = $user3->skip($pg)->limit(10);
*/
?>
   <table class="table">
                <thead>
                  <tr>
                    <th class="bdr">Total Music Torrents <?php echo  $length3;?></th>
                     <th class="bdr">Ratio</th>
                    <th class="">Hits</th>
                  </tr>
                </thead>
                <tbody>
<?php 
	//$user = $c_users->find(array('torrent_name' => $regex,'torrent_category' => 'Music'));
foreach ($user3 as $obj3)
        {
	?>
<tr>
                   <td class="pad" width="80%">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="bdr"><a href='second.php?torrent=<?php echo $obj[torrent_hash];?>'><?php echo $obj3[torrent_name];?></a></td>
						   <td width="10%" class="bdr"><span class="comment"><i class="fa fa-comment"></i>2</span></td>
                        </tr>
                     </table>
                      </td>
                      <td class="pad" width="30%"> 
					  <table width="100%">
                        <tr>
                          <td class="bdr"><?php echo $obj3[seaders];?></td>
                           <td class="bdr"><?php echo $obj3[leachers];?></td>
                        </tr>
                     </table></td>
                    <td class="bdr-padding" width="10%"><?php echo $obj3[file_count];?></td>
                  </tr>
          <?php }}?>  

  
                </tbody>
              </table>
    </div></div>
          </div>
        </div>
   
      </div>
      <div class="col-lg-3 side-bar">
      <div class="list-box">
                     <span class="heading-row">Browse torrents</span>
                     <ul>
                         <li><a href="/top-100"><i class="icon-star"></i> Top 100 Torrents</a></li>
                         <li><a href="/trending"><i class="icon-trending-torrent"></i> Trending Torrents</a></li>
                         <li><a href="/movie-library/0/"><i class="icon-movie-library"></i> Movie library</a></li> 
                         <li><a href="/cat/Anime/0/"><i class="icon-anime"></i> Anime</a></li>
                         <li><a href="/cat/Apps/0/"><i class="icon-application"></i> Applications</a></li>
                         <li><a href="/cat/Documentaries/0/"><i class="icon-document"></i> Documentaries</a></li>
                         <li><a href="/cat/Games/0/"><i class="icon-game"></i> Games</a></li>
                         <li><a href="/cat/Movies/0/"><i class="icon-movie"></i> Movies</a></li>
                         <li><a href="/cat/Music/0/"><i class="icon-music"></i> Music</a></li>
                         <li><a href="/cat/Other/0/"><i class="icon-other"></i> Other</a></li>
                         <li><a href="/cat/TV/0/"><i class="icon-tetevision"></i> Television</a></li>
                         <li><a href="/cat/XXX/0/"><i class="icon-xxx"></i> XXX</a></li>
                               </ul>
                 </div>
      
      </div>
    </div>
  </div>
<?php  


for($q=0;$q<$pgnum;$q++){
echo "<a href='index.php?q=$_POST[search]&cat=$_POST[cat]&page=$q'>$q</a>";
}
?>
</div>
<footer class="">
	<div class="container footer">
    <div class="col-md-6">  <ul>
                   <li class="active"><a href="/">home</a></li>
                   <li><a href="/rules">rules</a></li>
                             <li><a href="/contact">dmca</a></li>
                   <li><a href="/contact">contact</a></li>
               </ul></div>
               <div class="col-md-6"><p>2015 © Torrent Hub ALL Rights Reserved. Privacy Policy | Terms of Service</p></div>
  </div>

</footer>
<!--<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.min.js" type="text/javascript"></script> 
-->



<script src="js/dataTables.bootstrap" type="text/javascript"></script> 
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script> 
<script>$(document).ready(function() {
    $('#example').dataTable();
} );</script>
</body>
</html>


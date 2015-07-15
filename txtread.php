<form enctype="multipart/form-data" action="" method="POST"> 
Daily Data File Upload: <input name="uploaded" type="file" /><br /> 
<input type="submit" value="Upload" /> 
</form> 


<?php 
// Configuration
	$dbhost = 'localhost';
	$dbname = 'torrents';

	// Connect to test database
	$m = new Mongo("mongodb://$dbhost");
	$db = $m->$dbname;

	// Get the users collection
	$c_users = $db->tdata;


$target = "dailydata/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
$filename=basename( $_FILES['uploaded']['name']);
$ok=1;


 
            if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) { 
                     echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
            
 

$file = fopen($target,"r");

while(!feof($file))
  {
   $ads=fgets($file);
$td=explode("|",$ads);
$items1=$td[1];
$items2=$td[0];
$items3=$td[2];
$items4=$td[3];
$items4a=$td[4];
$items5=$td[5];
$items6=$td[6];
$items6a=$td[7];
$items7=$td[8];
$items8=$td[9];
$items9=$td[10];


$user = $c_users->find(array('t_hash' =>$items2));
  $length = $user->count();

if($length=='0'){
$user1 = $c_users->insert(array('t_hash' =>$items2, 'torrent_name'=>$items1, 't_category'=>$items3, 'info_url'=>$items4, 't_download'=>$items4a, 'size'=>$items5, 'category_id'=>$items6, 'file_count'=>$items6a, 'seaders'=>$items7, 'leachers'=>$items8, 'upload_nm'=>'', 'upload_date'=>$items9));
}

  }

fclose($file);
} else { echo "Sorry, there was a problem uploading your file."; } 

?>
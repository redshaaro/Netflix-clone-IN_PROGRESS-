<?php
require_once("../includes/config.php");


if(isset($_POST["videoId"])&&isset($_POST["username"])){
	$query=$con->prepare("SELECT * FROM videoProgress WHERE username=:username AND videoId=:videoId");
	$query->bindvalue(":username",$_POST["username"]);
	$query->bindvalue(":videoId",$_POST["videoId"]);
	$query->execute();
	if($query->rowCount()==0){
	      $query=$con->prepare("INSERT INTO videoProgress(username,videoId) VALUES(:username,:videoId)");
		  $query->bindvalue(":username",$_POST["username"]);
	      $query->bindvalue(":videoId",$_POST["videoId"]);
	      $query->execute();
		  
		  
}
}
else {
	echo "no videoId or username passed into file";
}





?>
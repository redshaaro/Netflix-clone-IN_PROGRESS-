<?php


require_once("includes/header.php");
if(!isset($_GET["id"])){
 ErrorMessage::show("No Id passed into page");
}
$entityId= $_GET["id"];
$entity= new Entity($con,$entityId);
$entityId= $_GET["id"];
$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo($entity);
$seasonProvider = new SeasonProvider($con, $userLoggedIn);
echo $seasonProvider->create($entity);
$categoryContainer = new CategoryContainer($con, $userLoggedIn);
echo $categoryContainer->showCategory($entity->getCategoryId(), "you might also like");




?>
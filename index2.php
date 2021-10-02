
<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/Entity.php");

require_once("includes/header.php");



if(!isset($_SESSION["userLoggedIn"])) {
    header("Location:register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo(null);
$Container = new CategoryContainer($con, $userLoggedIn);
echo $Container->showAllCategories();
?>


<!DOCTYPE html>
<html>

<head>


<title>zeflix</title>















</head>






<body>













</body>












</html>
<?php

if(isset($_GET['p'])) {
	$page = $_GET['p'];
} else{
	$page = 'public/home';
}

include("views/$page.php");

?>
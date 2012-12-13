<?php
session_start();
// Load DB constants
require('../config/db.php');
extract($_POST);
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// insert/' (backslash-single quote)
$post_text = addslashes($post_text);
$post_title = addslashes($post_title);



//if(...){
//$_SESSION['post_title'] = $post_title;
//$_SESSION['post_text'] = $post_text;
//header(...);
//die();
//}

// Construct query
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	$_SESSION['message']="$post_title was added successfully!";
	
	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close connection
$conn->close();
<div id=heading></div><h1>WELCOME TO JASON'S BLOG!!!</h1></div>
<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Get order, if any is present in QS


// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";
// Execute the query
$results = $conn->query($sql);

?>
	
<?php while($post = $results->fetch_assoc()): ?>
	<?php $time = strtotime($post['post_datepublished']);
			$date = date('M j, Y',$time);
	?>
	
	<Section>
		<h2><?php echo $post['post_title'] ?></h2>
		<h4><?php echo $post['post_text'] ?></h4>
		<h6><?php echo $post['post_datepublished'] ?></h6>
	</Section>
		
<?php endwhile; ?>


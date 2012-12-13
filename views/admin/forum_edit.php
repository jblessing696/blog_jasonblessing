<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";

// Execute query
$results = $conn->query($sql);

// Get the band
$band = $results->fetch_assoc();

// Close the connection
$conn->close();

?>
<h2>Edit Post</h2>
<form class ="form-horizontal" action="actions/edit_post.php" method="post">
	<input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>" />
	<div class="control-group">
		<label class="control-label" for="post title">Post Title</label>
		<div class="controls">
			<input class="span9" type="text" name="post_title" placeholder="Post Title" /> 

			
		</div>
</div>


<div class="control-group">
		<label class="control-label" for="post">Post</label>
		<div class="controls">
			<textarea  class="span9" rows=10 name="post_text" placeholder=""></textarea>

		</div>
</div>
<div class="form-actions">
		<button type="submit" class="btn btn-success">Submit</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
</div>

</form>
		
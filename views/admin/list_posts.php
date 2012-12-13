<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Get order, if any is present in QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_title';
}

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY $order";

// Execute the query
$results = $conn->query($sql);

?>
<table class="table table-striped table-condensed table-bordered">
	<tr>
		<th><a href="./?p=admin/list_posts&amp;order=post_title">Post Title</a></th>
		<th><a href="./?p=admin/list_posts&amp;order=post_text">Post Text</a></th>
		<th><a href="./?p=admin/list_posts&amp;order=post_datepublished">Date Published</a></th>
		
	</tr>
<?php while($post = $results->fetch_assoc()): ?>
	<?php $time = strtotime($post['post_datepublished']);
			$date = date('M j, Y',$time);
	?>
	<tr>
		<td><?php echo $post['post_title'] ?></td>
		<td><?php echo $post['post_text'] ?></td>
		<td><?php echo $post['post_datepublished'] ?></td>
		
		<td class="actions">
			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=admin/forum_edit&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
		</td>
	</tr>
<?php endwhile; ?>
</table>
<a class="btn btn-primary" href="./?p=admin/form_add_post"><i class="icon-plus icon-white"></i>Add Blog Post</a>
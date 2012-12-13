<?php 
$band_name = '';
$band_genre ='';
$band_numalbums = '';
extract($_SESSION);

?>



<h2>Add a new post</h2>
<form class ="form-horizontal" action="actions/add_post.php" method="post">


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

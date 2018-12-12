<?php
	require('config/db.php');
	include('inc/header.php');

	// Check For Submit
	if(isset($_POST['editPost'])){
		// Get form data
		$update_id = mysqli_real_escape_string($db, $_POST['update_id']);
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$body = mysqli_real_escape_string($db, $_POST['body']);
		$author = mysqli_real_escape_string($db, $_SESSION['username']);

		$query = "UPDATE posts SET
					title='$title',
					author='$author',
					body='$body'
						WHERE id = {$update_id}";

		if(mysqli_query($db, $query)){
			header('Location: content.php');
		} else {
			echo 'ERROR: '. mysqli_error($db);
		}

	}

	// get ID
	$id = mysqli_real_escape_string($db, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($db, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($db);
?>
<?php if (!isset($_SESSION['username'])): ?>
	<?php header("Location: index.php"); ?>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mb-5">
				<h1>Add Post</h1>
			</div>
		<div class="col-sm-6">
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="editPost" value="Edit" class="btn btn-info">
		</form>
	</div>
	<div class="col-sm-6">
		<?php include('inc/errors.php'); ?>
	</div>
	</div>
	</div>
	<?php endif; ?>
<?php include('inc/footer.php'); ?>

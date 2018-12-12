<?php
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($db, $_POST['delete_id']);

		$query = "DELETE FROM posts WHERE id = {$delete_id}";

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
	<?php include('inc/header.php'); ?>
	<?php if (!isset($_SESSION['username'])): ?>
		<?php header("Location: index.php"); ?>
	<?php else: ?>
		<div class="container">
			<a href="<?php echo 'content.php'; ?>" class="badge badge-secondary">Back</a>
			<h1><?php echo $post['title']; ?></h1>
			<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
			<p><?php echo $post['body']; ?></p>
			<hr>
			<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				<a href="editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-info">Edit</a>
			</form>
		</div>
<?php endif; ?>
<?php include('inc/footer.php'); ?>

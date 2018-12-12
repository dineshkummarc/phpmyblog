<?php
	require('config/db.php');

	if (!isset($_SESSION['username'])){

	}

	// Create Query
	$query = 'SELECT * FROM posts ORDER BY id desc';
	// Get Result
	$result = mysqli_query($db, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($db);

// Greeting msg
$Hour = date('G');
$msg = "";
if ( $Hour >= 5 && $Hour <= 11 ) {
    $msg = "Good Morning";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    $msg = "Good Afternoon";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $msg = "Good Evening";
}


?>
<?php include('inc/header.php'); ?>
<?php if (!isset($_SESSION['username'])): ?>
	<?php header("Location: index.php"); ?>
<?php else: ?>
<div class="jumbotron">
	<h1 class="display-4"><?php echo $msg ?> <?php echo $_SESSION['username'] ?></h1><span>&#x2764;</span>
	<p class="lead">myPhpBlog is a blogging platform where you can share your thoughts about the php language</p>
</div>

		<?php foreach($posts as $post) : ?>
		<div class="row" id="post">
			<div class="col-sm-2 mr-2">
					<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($post['image'] ).'" height="200" width="200" class="img-thumnail" />'?>
			</div>
		  <div class="col-sm-8">
				<h1><?php echo $post['title']; ?></h1>
				<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
				<p><?php echo substr($post['body'], 0, 50); ?>...</p>
				<a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-danger">Read More</a>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
<?php include('inc/footer.php'); ?>

<?php
require('config/db.php');
include('inc/header.php');
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
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Body</label>
						<textarea name="body" class="form-control"></textarea>
					</div>
					<input type="submit" name="addPost" value="Submit" class="btn btn-danger">
				</form>
			</div>
			<div class="col-sm-6">
				<?php include('inc/errors.php'); ?>
			</div>
		</div>
		</div>
<?php endif; ?>
<?php include('inc/footer.php'); ?>

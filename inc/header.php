<?php
include('inc/functions.php');
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>PHP Blog</title>
			<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
			<link rel="stylesheet" href="assets/styles.css">
		</head>
	<body>
		<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex flex-row align-items-center p-2 bd-highlight">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>content.php"><span class="logo-t"><</span>MyPhpBlog<span class="logo-t">></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['username'])): ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo ROOT_URL; ?>content.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo ROOT_URL; ?>addpost.php">Add Post</a>
      </li>
			<li class="nav-item">
				<a class="nav-link text-white" href="<?php echo ROOT_URL; ?>changePass.php">Change Password</a>
			</li>
      <li class="nav-item ml-auto p-2">
        <a class="nav-link text-white badge badge-danger" href="<?php echo ROOT_URL; ?>logout.php">Log out</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo ROOT_URL; ?>index.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo ROOT_URL; ?>register.php">Register</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

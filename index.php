<?php include('inc/header.php');?>

<div class="login_main">
  <div class="row">
    <div class="col-sm-12 mb-5">
      <h1>Welcome to MyPhpBlog</h1>
      <h2>Please log in</h2>
    </div>
    <div class="col-sm-6">
      <form action="index.php" method="post" enctype="multipart/form-data">
        username: <input placeholder="Username" name="username" type="text" autofocus><br><br>
        password: <input placeholder="Password" name="password" type="password"><br><br>
        <input class="btn btn-warning" name="login_user" type="submit" value="Login"><br><br>
    </form>
      Not a memeber yet? <a href="register.php">Register here</a>
    </div>
    <div class="col-sm-6">
      <?php include('inc/errors.php'); ?>
    </div>
  </div>
</div>

<?php include('inc/footer.php'); ?>

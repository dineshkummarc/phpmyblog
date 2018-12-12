

<?php
require('config/db.php');
include('inc/header.php');

?>
<?php if (!isset($_SESSION['username'])): ?>
	<?php header("Location: index.php"); ?>
<?php else: ?>
<div class="login_main">
  <div class="row">
    <div class="col-sm-12 mb-5">
      <h1>Change Password</h1>
    </div>
    <div class="col-sm-6">
      <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="username" placeholder="">
        <br><br>
        New Password: <input type="password" name="new_pass" placeholder="Enter new pass">
        <br><br>
        <input name="passChange" type="submit" value="Change" class="btn btn-warning">
      </form>
    </div>
    <div class="col-sm-6">
      <?php include('inc/errors.php'); ?>
    </div>
  </div>
</div>
<?php endif; ?>
<?php include('inc/footer.php'); ?>

<?php
require('config/db.php');
include('inc/header.php');
?>

 <div class="login_main">
   <div class="row">
     <div class="col-sm-12 mb-5">
       <h1>Welcome to MyPhpBlog</h1>
       <h2>Registration form</h2>
     </div>
     <div class="col-sm-6">
       <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
         username: <input type="text" name="username" placeholder="username">
         <br><br>
         password: <input type="password" name="password_1" placeholder="password">
         <br><br>
         password: <input type="password" name="password_2" placeholder="re-enter password">
         <br><br>
         <input name="reg_user" type="submit" value="Register" class="btn btn-warning">
       </form>
     </div>
     <div class="col-sm-6">
       <?php include('inc/errors.php'); ?>
     </div>
   </div>
</div>
<?php include('inc/footer.php'); ?>

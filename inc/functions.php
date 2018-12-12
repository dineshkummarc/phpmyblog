<?php
session_start();
include_once("config/db.php");

$username = "";
$errors = array();
$_SESSION['success'] = "";

// REGISTER USER
if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username) && empty($password_1)) {
      array_push($errors, "All fields are required");
    }elseif (empty($username)) {
      array_push($errors, "Username is required");
    }elseif (empty($password_1)) {
      array_push($errors, "Password is required");
    }

  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $sql = "SELECT * FROM users WHERE username = '".$username."'";
     $result = mysqli_query($db, $sql);
     if(mysqli_num_rows($result)>=1)
        {
         array_push($errors, "Name already exists");
        }
      else
         {

  if (count($errors) == 0) {
    $password = password_hash($password_1, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, password)
          VALUES('$username', '$password')";
    mysqli_query($db, $query);

    header('location: index.php');
  }
}
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
	$pass = $_POST['password'];

	if (empty($username) || empty($pass)) {
		array_push($errors, 'All fields are required');
		return;
	}

	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = $db->query($query);

	if (!$result) {
		echo $db->error;
		return;
	}

	if ($result->num_rows <= 0) {
		array_push($errors, 'Could not find user');
		return;
	}

	$user = $result->fetch_object();

	if (!password_verify($pass, $user->password)) {
		array_push($errors, 'Wrong password!');
		return;
	}

	$_SESSION['username'] = $username;
	header('Location: content.php');
}


// change Password
if (isset($_POST['passChange'])) {
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $newPass = mysqli_real_escape_string($db, $_POST['new_pass']);

	if (empty($newPass)) {
		array_push($errors, 'Please Enter a New Password');
		return;
	}

  if (count($errors) == 0) {
    $nhp= password_hash($newPass, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password='$nhp' WHERE username='$username'";
    mysqli_query($db, $query);

    header("Location: logout.php");
  }
}

// Add posts
if(isset($_POST['addPost'])){
if ($_FILES['myimage']['size'] != 0 ) {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $body = mysqli_real_escape_string($db, $_POST['body']);
  $author = mysqli_real_escape_string($db, $_SESSION['username']);
  $file = addslashes(file_get_contents($_FILES["myimage"]["tmp_name"]));

  $query = "INSERT INTO posts(title, author, body, image) VALUES('$title', '$author', '$body', '$file')";
  }else{
    array_push($errors, 'empty file');
  }
  if (empty($title) || empty($body)) {
		array_push($errors, 'All fields are required');
		return;
	}
  if(mysqli_query($db, $query)){
    header('Location: content.php');
  } else {
    echo 'ERROR: '. mysqli_error($db);
  }
}

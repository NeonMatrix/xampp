<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Library Login</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<meta charset="utf-8">
</head>
<body>

<?php
	$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
	mysqli_select_db($db, "ca") or die(mysqli_error($db));

	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if ($uname == '') {
		// do nothing
	}
	else
	{
		$result = mysqli_query($db, "SELECT username, password 
									FROM users 
									WHERE username = '$uname' AND password = '$password' ;");
		$row = mysqli_fetch_row($result);
		
		if($row[0] != $uname OR $row[1] != $password)
		{
			echo '<script type="text/javascript">
						alert("Either the Username or Password are incorrect");
				</script>';
		}
		else
		{
			$_SESSION['uname'] = $uname;
			$_SESSION['password'] = $password;
		
			echo '<script type="text/javascript">
							function Redirect()
						{
							alert("SUCCESSFULLY LOGGED IN");
							location = "library.php";
						}
						
						Redirect();
				</script>';
		}
	}


	mysqli_close($db);
?>

<div id="register">
	<form  method="post">
		<p>Username:
		<input class="loginform" type="text" name="uname"></p>
		<p>Password:
		<input class="loginform" type="password" name="password"></p>
		<br>
		<p><input class="submit '" type="submit" value="Login"/></p>
	</form>

	<div>
	<h3>If you have no registered yet, please register <a href="register.php">here</a></h3>
</div>
</div>


</body>
</html>
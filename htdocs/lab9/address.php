<?php
	session_start();

	if(!isset($_SESSION['uname']))
	{
		echo '<script type="text/javascript">
							function Redirect()
						{
							location = "login.php";
						}
						
						Redirect();
				</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Libraray</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<meta charset="utf-8">
</head>
<body>

<?php
	$logout = isset($_POST['logout']) ? $_POST['logout'] : '';
	
	if($logout == "LOG OUT")
	{
		session_destroy();

		echo '<script type="text/javascript">
						function Redirect()
					{
						location = "login.php";
					}
					
					Redirect();
			</script>';
			
	}
?>

<header>Address Book</header>


<br>
<?php
	echo ("Hello" . " " . $_SESSION['uname']);
?>
<br><br>

<form method="post" onsubmit="return confirm ('Are you sure you want to log out?')";>
				<input type="submit" value="LOG OUT" name="logout"/>
			</form>

</body>
</html>
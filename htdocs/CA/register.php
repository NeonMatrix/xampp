<!DOCTYPE html>
<html>
<head>
	<title>Library Register</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<meta charset="utf-8">
</head>


<body>

<?php
	$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
	mysqli_select_db($db, "ca") or die(mysqli_error($db));

	$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$con_password = isset($_POST['con_password']) ? $_POST['con_password'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$sname = isset($_POST['sname']) ? $_POST['sname'] : '';
	$address1 = isset($_POST['address1']) ? $_POST['address1'] : '';
	$address2 = isset($_POST['address2']) ? $_POST['address2'] : '';
	$city = isset($_POST['city']) ? $_POST['city'] : '';
	$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
	$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';

	if ($uname == '') {
		// do nothing
	}
	else
	{	
		if ($uname == '' OR $password == '' OR $con_password == '' OR $fname == '' OR $sname == '' OR 
			$address1 == '' OR $address2 == '' OR $city == '' OR $telephone == '' OR $mobile == '') 
		{
			echo '<script type="text/javascript">			
						alert("Please fill all the details");						
					</script>';
		}
		else
		{
			$result = mysqli_query($db, "SELECT username
										FROM users 
										WHERE username = '$uname';");
			$row = mysqli_fetch_row($result);
		
			if($row[0] != $uname)
			{

				if (strlen($password) != 6) 
				{
					echo "<script type='text/javascript'>
								alert('Password must be 6 charaters long');
							</script>";
				}
				else
				{
					if($password != $con_password)
					{
						echo "<script type='text/javascript'>
									alert('Passwords did not match!');
								</script>";
					}
					else
					{
						if (strlen($telephone) != 10 OR strlen($mobile) != 10) 
						{
							echo "<script type='text/javascript'>
									alert('Telephone and mobile numbers msut 10 digits');
								</script>";
						}
						else
						{

							echo '<script type="text/javascript">
											function Redirect()
										{
											alert("REGISTERED");
											location = "login.php";
										}
										
										Redirect();
								</script>';

							echo "REGISTERED";

							mysqli_query($db, "INSERT INTO users(username, password, firstname, surname, addressline1, addressline2, city, telephone, mobile)
							VALUES ('$uname', '$password', '$fname', '$sname','$address1','$address2', '$city', '$telephone','$mobile')");
						}
					}
				}
			}
			else
			{
				echo "<script type='text/javascript'>
								alert('This username is already taken');
							</script>";
			}
		}	
	}

	mysqli_close($db);
?>

<div id="register">

	<form method="post">
		<p>Username:
		<input class="loginform" type="text" name="uname"> </p>
		<p>Password:
		<input class="loginform" type="password" name="password"></p>
		<p>Confirm password:
		<input class="loginform" type="password" name="con_password"></p>
		<p>First Name:
		<input class="loginform" type="text" name="fname"></p>
		<p>Surname:
		<input class="loginform" type="text" name="sname"></p>
		<p>Address line 1:
		<input class="loginform" type="text" name="address1"></p>
		<p>Address line 2:
		<input class="loginform" type="text" name="address2"></p>
		<p>City:
		<input class="loginform" type="text" name="city"></p>
		<p>Telephone:
		<input class="loginform" type="number" name="telephone"></p>
		<p>Mobile:
		<input class="loginform" type="number" name="mobile"></p>
		<br>
		<p><input class="submit" type="submit" value="Register" /></p>
	</form>

</div>
</body>
</html>
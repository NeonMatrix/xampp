<!DOCTYPE html>
<html>

<head>
	<title>Lab 6 Database</title>
</head>

<body>

<?php

$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
mysqli_select_db($db, "labdb") or die(mysqli_error($db));

$uname = $_POST['uname'];
$p = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

//$db = "INSERT INTO users (name, email, password)
//VALUES ('$uname', '$p', '$fname', 'lname')";
//echo "<pre>\n$db\n</pre>\n";
mysqli_query($db, "INSERT INTO users (UserName, Password, FirstName, LastName)
VALUES ('$uname', '$p', '$fname', '$lname')");

echo '<table border="1">'."\n";
$result = mysqli_query($db, "SELECT UserName, Password, FirstName, LastName
FROM users");

echo '<tr>
		<td>User Name</td>
		<td>Password</td>
		<td>First Name</td>
		<td>Last Name</td>
	</tr>';

while ( $row = mysqli_fetch_row($result) ) {
echo "<tr><td>";
echo(htmlentities($row[0]));
echo("</td><td>");
echo(htmlentities($row[1]));
echo("</td><td>");
echo(htmlentities($row[2]));
echo("</td><td>\n");
echo(htmlentities($row[3]));
echo("</td></tr>");
}

echo '</table>';
?>


<p>Add A New User</p>
<form method="post">
<p>User Name:
<input type="text" name="uname"></p>
<p>Password:
<input type="password" name="password"></p>
<p>First Name:
<input type="text" name="fname"></p>
<p>Last Name:
<input type="text" name="lname"></p>

<p><input type="submit" value="Add New"/></p>
</form>

</body>


</html>
<!DOCTYPE html>
<html>

<head>
	<title>Lab 7 Add Database</title>
	<meta charset="UTF-8">
</head>

<body>

<?php
"<pre>\n";

$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
mysqli_select_db($db, 'labdb') or die(mysqli_error($db));

$prodID = isset($_POST['prodID']) ? $_POST['prodID'] : '';

mysqli_query($db, "DELETE FROM products WHERE products.ProductID = '$prodID' ");


$result = mysqli_query($db, 'SELECT  * FROM products');
//while ( $row = mysqli_fetch_row($result) ) {
//print_r($row);

echo '<table border="1" >' . "<br>";
echo '<tr>
		<td>ProductID</td>
		<td>Product Name</td>
		<td>Description</td>
		<td>Price</td>
		<td>Stock</td>
	</tr>';

while ($row = mysqli_fetch_row($result) ) {

//while ($row = mysqli_query($db, "SELECT * FROM product") ) {
echo "<tr><td>";
echo($row[0]);
echo("</td><td>");
echo($row[1]);
echo("</td><td>");
echo($row[2]);
echo("</td><td>");
echo($row[3]);
echo("</td><td>");
echo($row[4]);
echo("</td></tr>\n");
}
echo "</table>";

"</pre>\n";

mysqli_close($db);
?>

<p><b><h3>Delete Product</h3></b></p>
<form action="delete.php" method="post" onsubmit="return confirm ('ARE YOU SURE');">

<p>Product ID to delete:
<input type="text" name="prodID"></p>

<p><input type="submit" value="Delete"/></p>

</form>


<br><br>
<div>
	<a href="http://localhost/lab7/home.php">SHOW PRODUCT</a>
	<a href="http://localhost/lab7/add.php">ADD</a>
	<a href="http://localhost/lab7/delete.php">UPDATE</a>
</div>
	
</body>


</html>
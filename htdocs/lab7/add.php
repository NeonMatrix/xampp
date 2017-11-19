<!DOCTYPE html>
<html>

<head>
	<title>Lab 7 Add Database</title>
	<meta charset="UTF-8">
</head>

<body>

<?php
"<pre>\n";

$prodID = isset($_POST['prodID']) ? $_POST['prodID'] : '';
$pname = isset($_POST['pname']) ? $_POST['pname'] : '';
$desc = isset($_POST['description']) ? $_POST['description'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$stock = isset($_POST['stock']) ? $_POST['stock'] : '';

$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
mysqli_select_db($db, 'labdb') or die(mysqli_error($db));

if ($pname == '') {
	# code...
}
else
{
	mysqli_query($db, "INSERT INTO products (PName, Description, Price, Stock)
		VALUES ('$pname', '$desc', '$price', '$stock')");
}


$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
mysqli_select_db($db, 'labdb') or die(mysqli_error($db));


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

<p><b><h3>Add A New Product</h3></b></p>
<form method="post">
<p>Product Name:
<input type="text" name="pname"></p>
<p>Description:
<textarea name = "description" cols="50">Enter description here...</textarea></p>
<p>Price:
<input type="float" name="price"></p>
<p>Stock:
<input type="number" name="stock"></p>

<p><input type="submit" value="Add New"/></p>
</form>


<br><br>
<div>
	<a href="http://localhost/lab7/home.php">SHOW PRODUCT</a>
	<a href="http://localhost/lab7/update.php">UPDATE</a>
	<a href="http://localhost/lab7/delete.php">DELETE</a>
</div>
	
</body>


</html>
<!DOCTYPE html>
<html>

<head>
	<title>Lab 6 Database</title>
</head>

<body>

<?php
"<pre>\n";

$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
mysqli_select_db($db, "labdb") or die(mysqli_error($db));

$result = mysqli_query($db, "SELECT * FROM product");
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

//while ($row = mysqli_fetch_row($result) ) {
if ($result=mysqli_query($db, mysqli_query($db, "SELECT * FROM product"))
{
  // Fetch one and one row
  
while ($row=mysqli_fetch_row($result))
{
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
}

"</pre>\n";

mysqli_close($db);


?>

</body>


</html>
<!DOCTYPE html>
<html>
<head>
	<title>Concatenation of Strings</title>
</head>

<body>

<?php

$num1 = 5;
echo "num 1 = $num1       ";
$num2 = 7;
echo " num 2 = $num2      ";
$num3 = 10;
echo " num 3 = $num3 ";

echo "<br> <br>" ;

if ($num3 == 21)
{
	print "TRUE, $num3 == 21";
	echo "<br> <br>" ;
}
else
{
	print "FLASE, $num3 != 21";
	echo "<br> <br>" ;
}

if ($num1 > $num2)
{
	print "TRUE, $num1 > num2";
	echo "<br> <br>" ;
}
else
{
	print "FALSE, $num1 < num2";
	echo "<br> <br>" ;
}

if (($num1 * $num2) > $num3)
{
	print 'TRUE, ' . $num1 . ' * ' . $num2 . ' = ' .($num1*$num2) . ' > '. $num3 . '.';
	echo "<br> <br>" ;
}
else
{
	print 'FALSE, ' . $num1 . ' * ' . $num2 . ' = ' .($num1*$num2) . ' < '. $num3 . '.';
	echo "<br> <br>" ;
}

?>

</body>

</html>
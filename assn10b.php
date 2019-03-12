<html>
<head>
<title> Assignment 10 Part 1 </title>
This page will let you see what book in inventory are from a given publisher. First select publisher from dropdown and click show.
<br><br><br>
</head>
<body>
<?php
include "hconn.php";
#the include
$sql='select * from Publisher';  #query to get pulisher list
echo '<form action="assn10b.php" method="post">';  #form creation
	print 'Publishers: ';
echo '<select name="publ" id="publ">'; #dropdown creation
	foreach($conn->query($sql) as $row)  #loop to fill in dropdown
	{
		echo '<option value="';
		echo $row["PublisherCode"];  #submits the code to other query
		echo '">';
		echo $row["PublisherName"]; #shows publisher
		echo '</option>';
	}
		echo '</select>';# end dropdown
echo '<br><input type="submit" name="submit" value="Show"><br>'; #create buten to show stuff
echo	'</form>';#end form
if ($_SERVER['REQUEST_METHOD']=='POST')# checks for a button press
{
	$code=$_POST['publ'];#sets variable as submited code
	
	# aborted atemp to put the name of publisher in table some lines code deleted
	#echo "<table border=2>";
#	echo "<tr><th>";
#	echo $row["PublisherName"];
#	echo "'s Titles </th></tr>";
$sql="Select Title from Book where PublisherCode ='$code'";
#create second statement
echo "<table border=1>"; #create a table
echo "<tr><th> Book Titles </th>";
foreach($conn->query($sql) as $row)#loop throw query output
{
echo "<tr><td>";
echo $row["Title"];
echo "</td></tr>";
}
echo "</table>";#end table
}
?>
</body>
<footer>
<p align='center'> Michael Peterson Section 1</p>
<br>
<a href="http://students.cs.niu.edu/~z1838929/assn10.php">Whole Inventory</a>
<br>
<a href="http://students.cs.niu.edu/~z1838929/assn10c.php">Other data</a>
</footer>

</html>

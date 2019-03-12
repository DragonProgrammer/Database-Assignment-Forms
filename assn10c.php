<html>
<head>
<title> Assignment 10 Part 1 </title>
This page lets you select an author and see what books we have of thiers and how much they cost. It will also show you a list of places where you can buy each book from us.
<br><br><br>
</head>
<body>
<?php
include "hconn.php";
#the include
$sql='select * from Author';  #query to get pulisher list
echo '<form action="assn10c.php" method="post">';  #form creation
	print 'Authors: ';
echo '<select name="auth" id="auth">'; #dropdown creation
	foreach($conn->query($sql) as $row)  #loop to fill in dropdown
	{
		echo '<option value="';
		echo $row["AuthorNum"];  #submits the code to other query
		echo '">';
		echo $row["AuthorFirst"].' '.$row["AuthorLast"]; #shows author names
		echo '</option>';	
	}
		echo '</select>';# end dropdown
echo '<br><input type="submit" name="submit" value="Show"><br>'; #create buten to show stuff
echo	'</form>';#end form
if ($_SERVER['REQUEST_METHOD']=='POST')# checks for a button press
{
	$code=$_POST['auth'];#sets variable as submited code
$sql="Select * from Book, Wrote where Wrote.BookCode = Book.BookCode and Wrote.AuthorNum ='$code'";
#create second statement
echo "<table border=1>"; #create a table
echo "<tr><th> Book Titles </td><td> Price </td></th>";
foreach($conn->query($sql) as $row)#loop throw query output
{
echo "<tr><td>";
echo $row["Title"];
echo "</td><td>";
echo $row["Price"];
echo "</td></tr>";
}
echo "</table>";#end table

$sql="Select * from Book, Wrote, Inventory, Branch where Wrote.BookCode = Book.BookCode and Wrote.BookCode=Inventory.BookCode and Inventory.BranchNum=Branch.BranchNum and Wrote.AuthorNum ='$code'";
#create third statement for displaying inventory by author
echo "<table border=1>"; #create a table
echo "<br><br> Places to buy these books <br>";

echo "<tr><th> Book Titles </td><td> Store </td><td> Address </td></th>";
foreach($conn->query($sql) as $row)#loop throw query output
{
echo "<tr><td>";
echo $row["Title"];
echo "</td><td>";
echo $row["BranchName"];
echo "</td><td>";
echo $row["BranchLocation"];
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
<a href="http://students.cs.niu.edu/~z1838929/assn10b.php">Publisher Search</a>
</footer>

</html>

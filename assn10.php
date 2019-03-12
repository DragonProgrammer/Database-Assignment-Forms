<html>
<head>
<title> Assignment 10 Part 1 </title>
THis page displays the whole inventory with ordered by book title then by store.
</head>
<body>
<?php
include "hconn.php";#the include
#require ('conn.php');
$sql='Select Book.Title, Branch.BranchName, Inventory.OnHand from Book, Branch, Inventory where Book.BookCode= Inventory.BookCode and Inventory.BranchNum = Branch.BranchNum order by Book.Title, Branch.BranchName;';
#the query
$q = $conn->query($sql) or die("ERROR: " . implode(",", $conn->errorInfo()));
echo "<table border=1>"; #table creation
echo "<tr><th> Book Title </th><th> Store Name </th><th> In Stock</th></tr>";
while($row=$q->fetch(PDO::FETCH_ASSOC))#loop to spit out data in table
{
echo "<tr><td>";
echo $row["Title"].' </td><td> '.$row["BranchName"].' </td><td align="center"> '. $row["OnHand"].' </td></tr> ';
}#end loop
?>
</table>
</body>
<p align = center> Michael Peterson Section 1 </p>
<br>
<a href=http://students.cs.niu.edu/~z1838929/assn10b.php>Publisher Search</a>
<br>
<a href=http://students.cs.niu.edu/~z1838929/assn10c.php>Author Search</a>
</html>

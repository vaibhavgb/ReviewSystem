<!DOCTYPE html>
<html>
<head>
	<title>ABC</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="header">
		<img class="logo" src="img/logo.png">
	</div>

	<div class="container">
		<table cellpadding="10px" cellspacing="0px" border="0" align="center">
<tr align="center" bgcolor="" > <th colspan="2">Avaliable Products</th></tr>

<tr><th>Name</th> <th>Price</th></tr>

<?php
	include("connect.php.ini");
	$result=mysql_query("select * from product" );
	$colour=0;
	while($row=mysql_fetch_array($result)){
		if($colour == 0){
			echo "<tr bgcolor='#ACACFF'> <td> <a href='product.php?pid=".$row['prId']."'>".$row['prName']."</td>";
			echo "<td>".$row['prPrice']."</td></tr>";
			$colour=1;
		}
		else{
			echo "<tr bgcolor='#D1D1FF'> <td> <a href='product.php?pid=".$row['prId']."'>".$row['prName']."</td>";
			echo "<td>".$row['prPrice']."</td></tr>";
			$colour=0;
		}
	}
?>
</table>
	</div>

</body>
</html>
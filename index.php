<?php include("header.php") ?>

	<fieldset class="field">
    <ul type="none"><li class="ulhead">Avaliable Products</li></ul>


<?php
	include("connect.php.ini");
	$result=mysql_query("select * from product" );
	echo "<ul class='prMainUl'> <li>";
	while($row=mysql_fetch_array($result)){
			echo "<ul type='none'> <fieldset><li><a href='product.php?pid=".$row['prId']."'><img src=".$row['prImg']."></a></li>";
			echo "<li> NAME : &nbsp;&nbsp;<spam style='color:blue'>".$row['prName']."</span></li>";
			echo "<li> PRICE :&nbsp;&nbsp; <spam style='color:red'>".$row['prPrice']." Rs. </span> </li> </fieldset></ul>";
	}
	echo "</li></ul>"
?>

</fieldset>
</div>

</body>
</html>
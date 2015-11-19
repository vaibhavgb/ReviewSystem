<?php include("header.php") ?>

	<fieldset class="field">
    	<ul class="ulhead"><li>Product Details</li></ul>
 
<?php


	if(!array_key_exists('pid', $_REQUEST))
	{
		echo "INVALID PRODUCT SELECTION";
		//header('Location:index.php');
	}

	else
	{
		
		$pid =$_REQUEST['pid'];
		include("connect.php.ini");
		$result=mysql_query("select prName,prDsc,prPrice,prImg from product where prId=".$pid);
		echo "<fieldset> <ul class='prMainUl'> <li>";
	
		$row=mysql_fetch_array($result);
		$img=$row['prImg'];
		$pname=$row['prName'];
			echo"<ul><li><img src=".$img."></li></ul>
				 <ul><li id=lipad> NAME : &nbsp;&nbsp;<spam style='color:blue'>".$pname."</span></li>
				 <li id=lipad> DESCRIPTION :&nbsp; <spam style='color:black'>".wordwrap($row['prDsc'], 70, '<br>', false)."</span></li>
				 <li id=lipad> PRICE :&nbsp;&nbsp; <spam style='color:red'>".$row['prPrice']." Rs. </span> </li>
				 <li id=lipad> <input type=button bgcolor='orange' value='Purchase Now'></li></ul>";
				
		echo "</li></ul></fieldset>";
		
	echo "<div align=right> <ul id='revlnk'><li><a id='nounderline'href='review.php?pid=".$pid."&img=".$img."&pname=".$pname."'>Add Reviews</a></li></ul></div> </fieldset>";
mysql_free_result($result);
$result=mysql_query("select * from reviews where pId='.$pid.'");

if(mysql_num_rows($result)<1)
	echo '<fieldset class="field"><ul class=ulhead id="reviewlgd"<spam style="background-color:red"><li> NO REVIEWS SO FOR</li></ul>';
else {
	echo '<fieldset class="field"><ul class=ulhead id="reviewlgd"><li> REVIEWS SO FOR</li></ul>';
	while($row=mysql_fetch_array($result))
	{
		$rid=$row['rid'];
		echo '    
    		<fieldset id=intrevie>
    		<legend>Review by &nbsp; "'.$row['rvrName'].'" </legend>
    			
    		<table cellspacing="10px" align="center">
  
				<tr align="left"> <td> E-mail : </td> <td>'.$row['rvrEmail'].' </td></tr>
	
			    <tr align="left"> <td> Rating : </td> <td>'.$row['ratings'].'</td> </tr>

			    <tr> <td>Review : </td> <td><textarea name="review" rows="8" cols="40" disabled="true"> '.$row['review'].'</textarea> </td> </tr>

    <tr><td colspan=2 align="center">Was this review helpful to you? &nbsp;&nbsp;&nbsp;&nbsp;<a href="product.php?pid='.$pid.'&action=yes&rid='.$rid.'&hlp='.$row['helpfull'].'"> YES </a>&nbsp;&nbsp;
    <a href="product.php?pid='.$pid.'&action=no&rid='.$rid.'&nhlp='.$row['notHelpfull'].'">NO</a>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    
    </table>

	</fieldset>	';
	}
	mysql_free_result($result);
}//else

if(array_key_exists('action', $_REQUEST))
{
	$rid=$_REQUEST['rid'];
	
	$action =$_REQUEST['action'];

	if(isset($_COOKIE['voted']))
	{
		$flg=0;
		$arr=$_COOKIE['voted'];
		//var_dump($arr);
		echo count($arr);
		if(is_array($arr))
		{
			foreach ($arr as $key => $value) 
			{
				if($value == $rid)
				{			
					$flg=1;	
					break;
				}
			}
		}
			
		if($flg==1)
		{
			echo '<script language="javascript">';
			echo 'alert("you already voted ")';
			echo '</script>';
		}
		else
		{
			if ($action == "yes")
			{
				$hlp=$_REQUEST['hlp'];
				$hlp += 1;
				$valquery="update reviews set helpfull='.$hlp.' where rId=".$rid;

				if (mysql_query($valquery))
				{
					$exp=time()+60*60*12*30;
					$arr=$_COOKIE['voted'];
					$cnt=count($arr);
					$arr[$cnt]=$rid;
					setcookie("voted[cnt]",$rid,$exp);

					echo '<script language="javascript">';
					echo 'alert("you voted successfully")';
					echo '</script>';
				}
			}

			if ($action == "no")
			{
				$nhlp=$_REQUEST['nhlp'];
				$nhlp += 1;
				$valquery="update reviews set notHelpfull='.$nhlp.' where rId=".$rid;

				if (mysql_query($valquery))
				{
					$exp=time()+60*60*12*30;
					$arr=$_COOKIE['voted'];
					$cnt=count($arr);					
					$arr[$cnt]=$rid;

					setcookie("voted[cnt]",$rid,$exp);

					echo '<script language="javascript">';
					echo 'alert("you voted successfully")';
					echo '</script>';
				}
			}
		}//else
	}//if is set cookie
	else
	{		
		if ($action == "yes")
		{
			$hlp=$_REQUEST['hlp'];
			$hlp += 1;
			$valquery="update reviews set helpfull='.$hlp.' where rId=".$rid;

			if (mysql_query($valquery))
			{
				$exp=time()+60*60*12*30;
				setcookie("voted[0]",$rid,$exp);

				echo '<script language="javascript">';
				echo 'alert("you voted successfully")';
				echo '</script>';
			}
		}

		if ($action == "no")
		{
			$nhlp=$_REQUEST['nhlp'];
			$nhlp += 1;
			$valquery="update reviews set notHelpfull='.$nhlp.' where rId=".$rid;

			if (mysql_query($valquery))
			{
				$exp=time()+60*60*12*30;
				setcookie("voted[0]",$rid,$exp);

				echo '<script language="javascript">';
				echo 'alert("you voted successfully")';
				echo '</script>';
			}
		}

	}//else cookie
}//if
}//MAIN eLSE
?>
</body>
</html>
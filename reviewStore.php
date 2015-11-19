<?php 

$email=$_POST['email'];
$uname=$_POST['uname'];
$review=$_POST['review'];
$rating=$_POST['rating'];
$pid=$_POST['product_id'];
$spam=0;

$html="<html><script type='text/javascript'>alert('Invalid Email Id')</script></html>";

$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"; 
if (! preg_match( $regex, $email ) ) 
	 { 
	 	echo "<html><script type='text/javascript'>alert('Enter a valid E-mail address ')</script></html>";
		header("Location: product.php");
	 } 

if (strlen($uname)<3){
	echo "<html><script type='text/javascript'>alert('UserName must be greter than 3 char</span>')</script></html>";
	header("Location: product.php");
}

if (strlen($review)<20){
	echo "<html><script type='text/javascript'>alert('<script type='text/javascript'>Review must be greter than 20 chars</span>')</script></html>";
	header("Location: product.php");
}


include("connect.php.ini");

$rdate = new DateTime();
$help=0;
$notHelp=0;
$val="('".$review."','".$ratings."','".$rdate."','".$uname."','".$email."','".$pid."','".$help."','".$notHelp."','".$spam."')";
$valquery="insert into reviews(review,ratings,rdate,rvrName,rvrEmail,pId,helpfull,notHelpfull,spam) values $val";

if (mysql_query($valquery,$link))
	{
			echo "<html><script type='text/javascript'>alert('Review Created Sucessfully')</script></html>";
			header("Location: product.php");
	}
else 
	die("<b><span style='color:red'>Kindly verify your Input valuse</span></b> <br>Error:".mysql_error());
/************/
?>


?>
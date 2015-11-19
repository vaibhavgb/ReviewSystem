<?php include("header.php") ?>

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
	 	echo '<script language="javascript">';
		echo 'alert("Enter valid email")';
		echo '</script>';
		header("Location: product.php?pid=".$pid);
	 } 

if (strlen($uname)<3){
		echo '<script language="javascript">';
		echo 'alert("name  must be greater than 3")';
		echo '</script>'; 
	header("Location: product.php?pid=".$pid);
	
}

if (strlen($review)<20){
		echo '<script language="javascript">';
		echo 'alert("REview must be greater than 20 char")';
		echo '</script>';
	header("Location: product.php?pid=".$pid);
}

if($rating== null){
	echo '<script language="javascript">';
	echo 'alert("Product must be rated")';
	echo '</script>';
	header("Location: product.php?pid=".$pid);	
}

include("connect.php.ini");

$date = new DateTime();
$rdate = $date->format('Y-m-d H:i:s');
$help=0;
$notHelp=0;
$val="('".$review."','".$rating."','".$rdate."','".$uname."','".$email."','".$pid."','".$help."','".$notHelp."','".$spam."')";
$valquery="insert into reviews(review,ratings,rdate,rvrName,rvrEmail,pId,helpfull,notHelpfull,spam) values $val";

if (mysql_query($valquery,$link))
	{
		echo '<script language="javascript">';
		echo 'alert("REview created Sucessfully")';
		echo '</script>';			
	}
else 
	die("<b><span style='color:red'>Kindly verify your Input valuse</span></b> <br>Error:".mysql_error());

?>
<?php

$host = "localhost";
$user = "phpuser";
$dbname = "rwsSys";
$passwd = "abc12";

$mysql_con = mysql_connect($host,$user,$passwd);


$database="create database $dbname";

if(mysql_query($database,$mysql_con))
	echo "Database created successfuly <br>";
else{
		die('Error occured while creating the Database :  '.mysql_errno());
}


if(!$mysql_con){
	die('Could not connect :  '.mysql_errno());
}

mysql_select_db($dbname,$mysql_con);

$create_table="create table product (
				prId int PRIMARY KEY AUTO_INCREMENT,
				prName varchar(20) NOT NULL,
				prDsc varchar(500),
				prPrice float(10,2) NOT NULL,
				prImg varchar(20))"; 

if (! mysql_query($create_table,$mysql_con))
	die('Table could not be created :  '.mysql_errno());
else
	echo "Table created successfuly <br>";

/*** INSERT RECORDs ***/

$insert4="insert into product values (8, 'SONY', 'MDR-XB30EX In-Ear Extra Bass Stereo Headphone (Black)', 5000, 'img/sony.jpg')";
if (! mysql_query($insert4,$mysql_con))
	die('RECORD NOT INSERTED  :  '.mysql_errno());
else
	echo "RECORD INSERTED successfuly <br>";

$insert1="insert into product values (10,'JBL', 'Yurbuds Inspire 300 Noise Isolating Sports In-Ear Headphone with Mic (Black)', 3000,'img/jbl.jpg')";
if (! mysql_query($insert1,$mysql_con))
	die('RECORD NOT INSERTED  :  '.mysql_errno());
else
	echo "RECORD INSERTED successfuly <br>";

$insert3="insert into product values (11,'PHILIPS', 'SHQ1207/28 Sport ActionFit In-Ear Headset for iPhone/iPod/iPad (Orange/Gray)', 2000,'img/philips.jpg')";
if (! mysql_query($insert3,$mysql_con))
	die('RECORD NOT INSERTED  :  '.mysql_errno());
else
	echo "RECORD INSERTED successfuly <br>";


$insert2="insert into product values (12,'BOSE', 'QuietComfort 20 Acoustic Noise Cancelling Headphones (White) for Samsung and Android Devices', 30000, 'img/bose.jpg')";
if (! mysql_query($insert2,$mysql_con))
	die('RECORD NOT INSERTED  :  '.mysql_errno());
else
	echo "RECORD INSERTED successfuly <br>";


				/******************************************/



$create_table="create table reviews
				(rid int PRIMARY KEY AUTO_INCREMENT,
				review varchar(250) NOT NULL, 
				ratings char(1) NOT NULL, 
				rdate timestamp NOT NULL,
				rvrName varchar(20) NOT NULL, 
				rvrEmail varchar(100) NOT NULL, 
				pId int NOT NULL, 
				helpfull int, 
				notHelpfull int,
				spam int, 
				FOREIGN KEY(pId) REFERENCES product(prid) )";

if (! mysql_query($create_table,$mysql_con))
	die('Table could not be created :  '.mysql_errno());
else
	echo "Table created successfuly <br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
/*
 * @Author: your name
 * @Date: 2020-04-16 22:27:16
 * @LastEditTime: 2020-04-26 13:47:10
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \sqli-labs\Less-36\index.php
 */
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-36 **Bypass MySQL Real Escape String**</title>
</head>

<body bgcolor="#000000">
<div style=" margin-top:70px;color:#FFF; font-size:23px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Dhakkan </font><br>
<font size="5" color="#00FF00">


<?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");

function check_quotes($string)
{
    $string= mysql_real_escape_string($string);    
    return $string;
}

// take the variables 
if(isset($_GET['id']))
{
$id=check_quotes($_GET['id']);
//echo "The filtered request is :" .$id . "<br>";

//logging the connection parameters to a file for analysis.
$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);

// connectivity 

mysql_query("SET NAMES gbk");
$sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
include("../config/config.php");
$result=mysql_query($sql);
$row = mysql_fetch_array($result);

	if($row)
	{
  	echo '<font color= "#00FF00">';	
  	echo 'Your Login name:'. $row['username'];
  	echo "<br>";
  	echo 'Your Password:' .$row['password'];
  	echo "</font>";
  	}
	else 
	{
	echo '<font color= "#FFFF00">';
	print_r(mysql_error());
	echo "</font>";  
	}
}
	else { echo "Please input the ID as parameter with numeric value";}
        
        

?>
</font> </div></br></br></br><center>
<img src="../images/Less-36.jpg" />
</br>
</br>
</br>
</br>
</br>
<font size='4' color= "#33FFFF">
<?php
function strToHex($string)
{
    $hex='';
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}
echo "Hint: The Query String you input is escaped as : ".$id ."<br>";
echo "The Query String you input in Hex becomes : ".strToHex($id);
?>
</center>
</font> 
</body>
</html>





 

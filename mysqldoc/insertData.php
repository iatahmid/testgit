<html>
<head>
<title>Insert Page</title>
</head>
<body>
</body>
<?php
if(isset($_POST['submit']))
{
	$con=mysql_connect('localhost','root','');
	if($con)
	{
		echo 'Connection Successful</br>';
	}
	else
	{
		echo 'Connection Failure';
	}
	
	mysql_select_db('test',$con);
	$n=$_POST['Name'];
	$a=$_POST['Age'];
	$s=$_POST['Salary'];
	
	$query="insert into T2(name,age,salary) values ('$n',$a,$s)";
	if(!mysql_query($query,$con))
	{
		echo 'Failure in data insertion';
	}
	else
		echo 'Insertion Successful';
		
	mysql_close($con);
}
?>
<table>
	<tr>
		<td>
				<form action="firstpage.php">
				<input type="submit" name="submitButton" value="Home">
				</form>
		</td>
		<td>
				<form action="showData.php" method="post">
				<p>
				  <input type="submit" name="submitButton2" value="Show" /> 
				</p>
		</td>
</form>
	</tr>
</table>

</html>
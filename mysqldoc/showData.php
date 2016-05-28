<html>
<head>
<title>Show Data</title>
</head>
<body>
<?php
if(isset($_POST['submitButton2']))
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
	$query='select * from T2';
	$result=mysql_query($query,$con);
	
	print '<table border="1">';
	
	while($row=mysql_fetch_assoc($result))
	{
		print '<tr>';
		foreach($row as $item)
		{
			//print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
			print '<td>';
			if($item !== null )
				print $item;
			else
				print '&nbsp';
			print '</td>';
		}
		
		print '</tr>';
	}
	
	print '</table>';
	mysql_close($con);
}
?>
<table>
<tr>
<td>
<form action="firstpage.php" method="post">
   

    <p>
      <input type="submit" name="Home" value="Home" /> 
    </p>
</form>
</td>
</tr>
</table>
</body>
</html>
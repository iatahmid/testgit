<html>
<head>
<title>Hello World</title>
</head>
<body>
Hello, World!
<?php
$myvar="This is a variable";
$number1 =5;
$number2 = 3;
$sum = $number1+$number2;
echo $sum;
echo "Hello , World!!";

$con = oci_connect('system','123','orcl');
if($con)
	echo 'Connection Successful';
else
	echo 'Connection Failed';
$con = oci_connect('hr','hr');
$query = 'select * from departments';
$stid = oci_parse($con, $query);
$r = oci_execute($stid);
//$con = oci_connect('hr','hr','orcl');
// Fetch each row in an associative array
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
}
print '</table>';

?>
</body>
</html>
<html>
<head>
</head>
<body>

<?php

   // If the submit button has been pressed...

   if (isset($_POST['submit']))
   {

      // Connect to the database
      $c = @oci_connect('hr', 'hr', '//localhost/orcl')
                or die("Could not connect to Oracle server");

	if($c)
		echo 'Connection Successful';
	else
		echo 'Connection Failed';
      // Retrieve the posted new location information.
      $name = $_POST['Name']; 
      $age = $_POST['Age'];
      $salary = $_POST['Salary']; 
      /*$City = $_POST['City']; 
      $StateOrProvince = $_POST['StateOrProvince'];
      $CountryCode = $_POST['CountryCode'];*/

      // Insert the location information into the LOCATIONS table
     /* $s = oci_parse($con, "insert into locations
                           (location_id, street_address, postal_code,
                            city, state_province, country_id)
                           values ($LocationID, '$StreetAddress', '$PostalCode',
                                   '$City', '$StateOrProvince', '$CountryCode')");*/
		echo 'Before insertion';
	$s = oci_parse($c, "insert into T1
                           (name,age,salary)
                           values ('$name',$age,$salary)");
      $result = oci_execute($s);

      // Display an appropriate message on either success or failure
      if ($result)
      { 
         echo "<p>Location successfully inserted!</p>"; 
         oci_commit($c);
      }
      else
      { 
         echo "<p>There was a problem inserting the location!</p>";
         var_dump(oci_error($s));
      }

      oci_close($c);
    }

  // Include the insertion form
  //include "insert_location.php";

?>
<table>
<tr>
<td>
<form action="index.php" method="post">
   

    <p>
      <input type="submit" name="Home" value="Home" /> 
    </p>
</form>
</td>
<td>

<form action="showData.php" method="post">
    <p>
      <input type="submit" name="submit" value="Show Data" /> 
    </p>
</form>
</td>
</tr>
</table>
</body>
</html>

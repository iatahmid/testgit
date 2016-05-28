<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p>Add a Location to the LOCATIONS table.</p>
    <p>
      Name:<br />
      <input type="text" name="Name" size="4" maxlength="4" value="" />
    </p> 
    <p>
      Age:<br />
      <input type="text" name="Age" size="40" maxlength="40" value="" /> 
    </p> 
    <p>
      Salary:<br />
      <input type="text" name="Salary" size="12" maxlength="12" value="" />
    </p>
  <!--  <p>
      City:<br />
      <input type="text" name="City" size="30" maxlength="30" value="" />
    </p>
    <p>
      State or Province:<br />
      <input type="text" name="StateOrProvince" size="25" maxlength="25" value="" /> 
    </p> 
    <p>
      Country Code:<br />
      <input type="text" name="CountryCode" size="2" maxlength="2" value="" />
    </p> -->
    <p>
      <input type="submit" name="submit" value="Submit!" /> 
    </p>
</form>

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



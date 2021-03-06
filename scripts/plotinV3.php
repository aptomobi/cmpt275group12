<?php
//Include database connection
require 'connect.php';
//INPUT: JSON Array {STRING: location, STRING: diseasetype}
//TODO: Access the related table and increment the last row's infected amount by 1.
$email = $_POST['email'];
$diseasetype = $_POST['Desease'];


//Find the location from the account
$sql = "SELECT Location FROM Accounts2 WHERE Email = '".$email."'";
$result = $conn->query($sql);

if ($result->num_rows == 1)
{
	$r = $result->fetch_assoc();
}
else
{
	$output = array(
			'error' => 'No location on account'
			);
	echo json_encode($output);
	exit();
}

//verify location
if ($r[Location] == "AB"||$r[Location] == "BC"||$r[Location] == "MB"||$r[Location] == "NB"||$r[Location] == "NL"||$r[Location] == "NS"||$r[Location] == "NT"||$r[Location] == "NU"||$r[Location] == "ONT"||$r[Location] == "PE"||$r[Location] == "QC"||$r[Location] == "SK"||$r[Location] == "YT")
{
	if($diseasetype == "influenza"||$diseasetype == "gastroenteritis"||$diseasetype == "conjunctivitis")
	{
		//If location and disease are valid, update table
		$sql = "UPDATE ".$r[Location]."3 SET ".$diseasetype." = ".$diseasetype." + 1 ORDER BY day DESC LIMIT 1";
		$conn->query($sql);
		//$locate = $r[Location];

		$output = array(
			'response' => array(
			'email' => $email ,
			'desease' => $diseasetype ,
			'location' => $r[Location]
				)
				);
		echo json_encode($output);
	}
	else
	{
		$output  = array(
				'error' => 'Invalid Disease.'
				);
		echo json_encode($output);
	}
}
else
{
	$output = array(
			'error' => 'Invalid location'
			);
	echo json_encode($output);
}
//Done.
$conn->close;
?>

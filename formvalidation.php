<?php 

$NameError='';
$EmailError='';
$WebsiteError='';
$GenderError='';


if(isset($_POST['Submit']))
{
	if(empty($_POST['Name']))
	{
		$NameError = "Name is mandatory";
	}
	else
	{
		$Name = Test_for_data($_POST['Name']);
		if(!preg_match("/^[A-Za-z\. ]*$/",$Name))
		{
			$NameError="Only letters and white spaces are allowed";
		}
	}

if(empty($_POST['Email']))
	{
		$EmailError = "Email is mandatory";
	}
	else
	{
		$Email = Test_for_data($_POST['Email']);
		if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
		{
			$EmailError="Invalid Email Address";
		}
	}

	if(empty($_POST['Gender']))
	{
		$GenderError =  "Gender is mandatory";
	}
	else
	{
		$Gender = Test_for_data($_POST['Gender']);
	}

	if(empty($_POST['Website']))
	{
		$WebsiteError =  "Website is mandatory";
	}
	else
	{
		$Website = Test_for_data($_POST['Website']);
		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Website))
		{
			$WebsiteError="Invalid Website name";
		}


	}

if(!empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Gender']) && !empty($_POST['Website']) )
{
	if((preg_match("/^[A-Za-z\. ]*$/",$Name)==true) && (filter_var($Email, FILTER_VALIDATE_EMAIL)==true) && (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Website)==true))
	{
			echo "<h2>Your Submitted Information</h2>";
			echo "Name : ".ucwords(($_POST['Name']))."<br>";
			echo "Email : {$_POST['Email']}<br>";
			echo "Gender : {$_POST['Gender']} <br>";
			echo "Website : {$_POST['Website']}<br>";
			echo "Comment : {$_POST['Comment']}<br>";
	}
	else
	{
		echo "<span class 'Error'>Please fill up all the remaining details</span>";echo"<br>";
	}
}


}

function Test_for_data($data)
{
	return $data;
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
</head>
<style type="text/css">
	
input[type="text"],input[type="Email"],textarea{
	border: 1px solid_dashed;
	background-color: rgb(221,216,212);
	width: 600px;
	padding: 0.5em;
	font-size: 1em;
}
.Error{
	color: red;
}

</style>



<body>
<h2>Form Validation with PHP</h2><br>

<form action="formvalidation.php" method="Post">
	<legend>* Please Fill Out the following Fields</legend>
<fieldset>	
	<label for "Name">Name :</label>
	<input class="input" type="text" name="Name">* <span class="Error"> <?php echo $NameError ?></span><br><br>
	<label for "E-mail">E-mail :</label>
	<input class="input" type="text" name="Email">*<span class="Error"><?php echo $EmailError ?></span><br><br>
	<label for "Name">Gender :</label>
	<input class="radio" type="radio" name="Gender">Male
	<input class="radio" type="radio" name="Gender">Female *<span class="Error"><?php echo $GenderError ?></span><br><br>
	<label  for="Website" >Website :</label>
	<input  class="input" type="text" name="Website">*<span class="Error"><?php echo $WebsiteError ?></span><br><br>
	<label for="Comment">Comment </label><br>
	<textarea name="Comment" rows="5" cols="25"></textarea><br><br>
	<label for="Submit"></label>
	<input type="Submit" name="Submit" value="Submit Your Response">
</fieldset>

</form>
</body>
</html>
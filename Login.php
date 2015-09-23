<?php


namespace Poshminds\Web;

use Poshminds\Data\User;
use Poshminds\Common\Helper;

require_once ('Common/common.php');
require_once ('Data\User.php');

session_start();
session_destroy();
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<title>Poshminds - Registration</title>
 <?php include '/Includes/jscssincludes.php';?>

</head>
<body>
 <?php include '/Includes/Header.php';?>
 <?php
$emailaddress = $password = $errorMessage = "";
$processflag = ProcessRequest ();
?>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Login</li>
		</ol>


		<div class="row">
			<div class="col-md-8">
				<form method="post" action="#" class="form-horizontal">
					<?php if ($errorMessage !="") {?>
					<div class="form-group">
						<label class="text-danger col-sm-6 pull-right"><?php echo $errorMessage?></label>
					</div>
				<?php }?>
					<div class="form-group">
						<label for="emailAddress" class="col-sm-6 control-label">Email
							address</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="emailAddress"
								name="emailAddress" placeholder="Email"
								value="<?php echo $emailaddress;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-6 control-label">Password</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password"
								name="password" placeholder="Password"
								value="<?php echo $password;?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 control-label">
							&nbsp;
						</div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-default">Submit</button>
							<a href="register.php" class="btn btn-link">Not registered?</a>
						</div>
					</div>

				</form>
			</div>
		</div>

	</div>
</body>
</html>


<?php 
function ProcessRequest()
{
	global   $emailaddress , $password, $errorMessage ;

	if ($_SERVER ['REQUEST_METHOD'] != "POST")
	{
		return false;
	}
	else{
		
		$emailaddress = Helper::striphtmlSpecialChars($_POST ["emailAddress"]);
		
		if (filter_var($emailaddress, FILTER_VALIDATE_EMAIL) == false)
		{
			$errorMessage ="Invalid Email Address";
			return false;
		}
		$password = Helper::striphtmlSpecialChars($_POST ["password"]);
		
		$userdata = User::GetUserByEmail($emailaddress);
		
		if ($password !== $userdata["password"])
		{
			$errorMessage ="Invalid Email Address / Password";
			return false;
		}
		else 
		{
			echo "Successfull login!!";
			$_SESSION["pmEmail"] =$emailaddress;
			$_SESSION["pmFirstName"] =$userdata["firstname"];
			header('Location: welcome.php');
		}
		
	}
	 
}
?>
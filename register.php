<?php namespace Poshminds\Web;
 use Poshminds\Data\User; 
 use Poshminds\Common\Helper;
 require_once ('Common/common.php');
 require_once ('Data\User.php');
 require_once('recaptchalib.php');
 
 // Get a key from https://www.google.com/recaptcha/admin/create
 $publickey = "6LfPRg0TAAAAAIyznC-eYVO5zSsLk060y1Hdsc-8";
 $privatekey = "6LfPRg0TAAAAAGebmB7_X_08fzXSu3ORPsHWcXdy";
 
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
	$firstname = $lastname= $emailaddress =$password=$confirmpassword = $mobile = $referenceoptions = $experienceoptions = $secretquestion1 = $secretquestion2 = $errorMessage ="";
	$processflag = ProcessRequest();
	?>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Registration</li>
		</ol>
<?php if ($processflag == false) {?>
		<div class="row">
			<div class="col-md-8">
				<form method="post" action="#" class="form-horizontal">
					<?php if ($errorMessage !="") {?>
					<div class="form-group">
						<label class="text-danger col-sm-6 pull-right"><?php echo $errorMessage?></label>
					</div>
				<?php }?>
					<div class="form-group">
						<label for="firstname" class="col-sm-6 control-label">First Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="firstname"
								name="firstname" placeholder="First Name"
								value="<?php echo $firstname;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-sm-6 control-label">Last Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="lastname"
								name="lastname" placeholder="Last Name"
								value="<?php echo $lastname;?>">
						</div>
					</div>
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
						<label for="confirmpassword" class="col-sm-6 control-label">Confirm
							Password</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="confirmpassword"
								name="confirmpassword" placeholder="Password"
								value="<?php echo $confirmpassword;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="mobile" class="col-sm-6 control-label">Mobile (wont be
							shared with anyone)</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="mobile" name="mobile"
								placeholder="mobile" value="<?php echo $mobile;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="referenceoptions" class="col-sm-6 control-label">Reference</label>
						<div class="col-sm-6">
							<!-- 
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-primary active"> <input type="radio"
								name="referenceoptions" id="posam" autocomplete="off" checked> Posam
							</label> <label class="btn btn-primary"> <input type="radio"
								name="referenceoptions" id="gnana" autocomplete="off"> Gnana
							</label>
						</div> -->
							<div class="radio">
								<label> <input type="radio" name="referenceoptions" id="posam"
									<?php echo ($referenceoptions === "posam"? "checked":"")?>
									value="posam"> Posam
								</label> <label> <input type="radio" name="referenceoptions"
									id="gnana" value="gnana"
									<?php echo $referenceoptions === "gnana"? "checked":""?>> Gnana
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="experienceoptions" class="col-sm-6 control-label">Stock
							Market Experience</label>
						<div class="col-sm-6">
							<!-- 
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-primary active"> <input type="radio"
								name="experienceoptions" id="dummy" autocomplete="off" checked> Dummy
							</label> <label class="btn btn-primary"> <input type="radio"
								name="experienceoptions" id="2yearsless" autocomplete="off"> < 2 years
							</label> <label class="btn btn-primary"> <input type="radio"
								name="experienceoptions" id="2yearsmore" autocomplete="off"> > 2 years
							</label>
						</div> -->


							<div class="radio">
								<label> <input type="radio" name="experienceoptions" id="dummy"
									<?php echo ($experienceoptions === "dummy"? "checked":"" )?>
									value="dummy"> Dummy
								</label> <label> <input type="radio" name="experienceoptions"
									id="2yearsless" autocomplete="off"
									<?php echo $experienceoptions === "2yearsless"? "checked":""?>
									value="2yearsless"> < 2 years
								</label> <label> <input type="radio" name="experienceoptions"
									id="2yearsmore" autocomplete="off"
									<?php echo $experienceoptions === "2yearsmore"? "checked":""?>
									value="2yearsmore"> > 2 years
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="secretquestion1" class="col-sm-6 control-label">Secret
							Question1: Place of your birth: <small>(remember this will be
								asked duing login, 1 word only, dont enter spaces) </small>
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="secretquestion1"
								name="secretquestion1" placeholder="ex: Tirupathi"
								value="<?php echo $secretquestion1;?>">
						</div>
					</div>

					<div class="form-group">
						<label for="secretquestion2" class="col-sm-6 control-label">Secret
							Question2: Best friend nickname: <small>(remember this will be
								asked duing login, 1 word only, dont enter spaces)</small>
						</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="secretquestion2"
								name="secretquestion2" placeholder="ex: posh"
								value="<?php echo $secretquestion2;?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-6 control-label">&nbsp;</div>
						<div class="col-sm-6">
							<?php echo recaptcha_get_html($publickey, null);?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6 control-label">&nbsp;</div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
		<?php }
		else {
		?>
		<div class="row">
			<div class="col-md-10">
				<p class="text-center ">Thank you very much for your business. 
					You have been successfully registered with
					Poshminds.com. Please activate yourself by clicking activation link
					sent in the email (check the junk mails for activation link".</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 ">
				<center>
				<a href="login.php" class="btn btn-default float-center">Go back to Home Page</a></center>
			</div>
		</div>
				 
		<?php }?>
	</div>

</body>
</html>


<?php 

function IsValidReCaptch()
{
	$retValue = false;
	if ($_POST ["recaptcha_response_field"]) {
		$resp = recaptcha_check_answer ( $GLOBALS['privatekey'], $_SERVER ["REMOTE_ADDR"], $_POST ["recaptcha_challenge_field"], $_POST ["recaptcha_response_field"] );
		if ($resp->is_valid) {
			$retValue = true;
		} 
	}
	return $retValue ;
}

function ProcessRequest()
{
	global $firstname , $lastname,  $emailaddress , $password, $confirmpassword ,$mobile ,
		$referenceoptions ,$experienceoptions , $secretquestion1 , $secretquestion2 , $errorMessage ;
	
	if ($_SERVER ['REQUEST_METHOD'] != "POST")
	{
		return false;
	}
	else{
		if (!IsValidReCaptch () )
		{
			$errorMessage="Invalid Captcha, Please try again";
			return false;
		}
		$firstname = Helper::striphtmlSpecialChars($_POST ["firstname"]);
		$lastname = Helper::striphtmlSpecialChars($_POST ["lastname"]);
		$emailaddress = Helper::striphtmlSpecialChars($_POST ["emailAddress"]);
	
		if (filter_var($emailaddress, FILTER_VALIDATE_EMAIL) == false)
		{
			$errorMessage ="Invalid Email Address";
			return false;
		}
	
		$password = Helper::striphtmlSpecialChars($_POST ["password"]);
		$confirmpassword = Helper::striphtmlSpecialChars($_POST ["confirmpassword"]);
		$mobile = Helper::striphtmlSpecialChars($_POST ["mobile"]);
		if (isset ( $_POST ['referenceoptions'] )) {
			$referenceoptions = $_POST ["referenceoptions"];
		}
	
		if (isset ( $_POST ['experienceoptions'] )) {
			$experienceoptions = $_POST ["experienceoptions"];
		}
		$secretquestion1 = Helper::striphtmlSpecialChars($_POST ["secretquestion1"]);
		$secretquestion2 = Helper::striphtmlSpecialChars($_POST ["secretquestion2"]);
	
		if ( $password != $confirmpassword )
		{
			$errorMessage .= "Password should match<br>";
			return false;
		}
		else {
				
			User::InsertUserData($firstname, $lastname, $emailaddress, $password, $referenceoptions, $experienceoptions, 
					$secretquestion1, $secretquestion2, 0, Helper::getCurrentDateTime());
			return true;	
		}
			
	}
	
}

?>

<?php namespace Poshminds\Web;
error_reporting(-1);
ini_set('display_errors', 'On');
use Poshminds\Data\User;
use Poshminds\Common\Helper;

require_once ('Common/common.php');
require_once ('Data/User.php');

session_start();

if (!isset($_SESSION["pmEmail"]))


?>
<!DOCTYPE html>
<html>
<head>
<title>Poshminds - ContactUs</title>
 <?php include 'Includes/jscssincludes.php';?>

</head>
<body>
 <?php include 'Includes/Header.php';?>
 
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Contact Us</li>
		</ol>


		<div class="row">
			<div class="col-md-8">
				
					<div class="row text-center">
						<h1>Under construction</h1>
					</div>
				

				
			</div>
		</div>

	</div>
	
	<?php include 'Includes/footer.php';?>
</body>
</html>
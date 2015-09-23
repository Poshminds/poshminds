<?php namespace Poshminds\Web;  
use Poshminds\Data\User;
use function Poshminds\Common\getCurrentDateTime;
include('Common/common.php');
include ('Data\User.php');

$user = new User();


$userdata = User::GetUserByEmail('gnanap@gmail.com');

echo sizeof($userdata);

foreach($userdata as $u => $user){
	echo $user["emailaddress"];
}
//var_dump($userdata['[emailaddress]']);

print_r( $userdata);

?>
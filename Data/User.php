<?php
namespace Poshminds\Data;
require_once('MySQLProvider.php');

class User
{
	public static function InsertUserData($firstname, $lastname, $emailaddress, $password, $reference,
			$experience, $securitykey1, $securitykey2, $active, $createdon)
	{
	
		try {
			$sql = "INSERT INTO user ( firstname, lastname, emailaddress, password, reference, experience, securitykey1, securitykey2, active, createdon)
			VALUES ('$firstname', '$lastname', '$emailaddress', '$password', '$reference',
			'$experience', '$securitykey1', '$securitykey2', $active, '$createdon')";
	
			\MySQLProvider::ExecuretSQL($sql);
			
		} catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
	
	}
	
	public static function GetUserByEmail($emailaddress)
	{
		try {
			$sql = "select userid, firstname, lastname, emailaddress, password, reference, experience, securitykey1, securitykey2, active, createdon 
			 from user where emailaddress='$emailaddress'";
		
			$data = \MySQLProvider::ExecuteDataSQL($sql);
			if(sizeof($data) == 1) {
				return $data[0];
			}
			return null;
				
		} catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
		
	}
	
	public static function GetUserById($userid)
	{
		try {
			$sql = "select userid, firstname, lastname, emailaddress, password, reference, experience, securitykey1, securitykey2, active, createdon
			from user where userid=$userid";
		
			$data = \MySQLProvider::ExecureDataSQL($sql);
		
		} catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
		
	}
	
	
	
}


?>
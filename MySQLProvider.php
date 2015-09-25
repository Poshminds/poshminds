<?php
class MySQLProvider
{

	
	private static function  GetConnection()
	{
		
		$servername = "mysql-poshminds.poshminds.com";
		$username = "poshminds123";
		$dbpassword = "poshminds123";
		
//		$servername = "localhost";
//		$username = "root";
//		$dbpassword = "";
		
		
		$dbname = "poshminds";
		
		$conn = new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $dbpassword );
		$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		return $conn;
	}
	
	public static function ExecuteSQL ($sql)
	{
		try {
			$conn = self::GetConnection();
			$conn->exec ( $sql );
			//echo "New record created successfully";
		}
		catch ( PDOException $e ) {
				echo $sql . "<br>" . $e->getMessage ();
		}
		$conn = null;
				
	}
	
	public static function ExecuteDataSQL($sql)
	{
		try {
			$conn = self::GetConnection();
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			// set the resulting array to associative
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$data = $stmt->fetchAll();
			return $data;
		}
		catch ( PDOException $e ) {
			echo $sql . "<br>" . $e->getMessage ();
		}
		$conn = null;
	}
}
	

?>
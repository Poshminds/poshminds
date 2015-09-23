<?php


namespace Poshminds\Common;

class Helper {
	public static function striphtmlSpecialChars($data) {
		$data = trim ( $data );
		$data = stripslashes ( $data );
		$data = htmlspecialchars ( $data );
		return $data;
	}
	public static function getCurrentDateTime() {
		return date ( 'Y-m-d H:i:s' );
	}
}
?>
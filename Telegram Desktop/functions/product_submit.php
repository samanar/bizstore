<?php  
	function check_code_duplicate($code) {
		global $db;
		$db->where("code" , $code);
		if($db->has("products"))
			return false;
		return true;
	}

	function is_empty($data) {
		if($data == "" || $data == null || strlen($data) == 0)
			return true;
		return false;
	}

?>
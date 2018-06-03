<?php  
	function get_input($data) {
		if($data == null || $data == "")
			return null;
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function is_duplicated_code($code) {
		global $db;
		$db->where("code" , $code);
		if($db->has("products"))
			return true;
		return false;
	}

	function is_duplicated_code_edit($code , $id) {
		global $db;
		$db->where("id" , $id);
		$info = $db->getOne("products");
		if($code == $info['code'])
			return false;
		$db->where("code" , $code);
		if($db->has("products"))
			return true;
		return false;
	}

	function is_empty($data) {
		if($data == "" || $data == null || strlen($data) == 0)
			return true;
		return false;
	}

	function show_form_error($error) {
		if($error != "" && $error != null )
			echo "<div class='form_error'>" . $error . "</div>";
	}

	function show_form_data($array , $index) {
		if(isset($array[$index]))
			echo "value='$array[$index]'";
		else 
			echo "value=''";
	}

	function create_partitions_code() {
		global $db;
		$partitions = $db->get("partititons");
		$previous = 0;
		for ($i = 0 ; $i < count($partitions) - 1; $i++) {
			if($partitions[$i + 1]['code'] - $partitions[$i]['code'] != 1){
				
			}
		}
	}


	function check_image_errors($target) {
		$error = "";
		if(isset($_FILES[$target]) && $_FILES[$target]['tmp_name'] != "") {
			if($_FILES[$target]['size'] > 1000000)
				$error = "ساید عکس غیر مجاز است";
			else if(! getimagesize($_FILES[$target]["tmp_name"])){
				$error = "فایل آپلود شده عکس نمیباشد";
			}

			$path = $_FILES[$target]['name'];
			$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
			// echo $ext;
			if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
				// 
			} else {
				$error = "فرمت فایل ناشناخته است";
			}
		}

		return $error;
	}

	function send_album() {
		$db->where("active" , 1);
		$album_data = $db-getOne("albums");
		$db->where("album_id" , $album_data['id']);
		$album_products = $db->get("album_product");
		$groups = $db->get("groups");
		for ($i = 0; $i < count($groups) ; $i++) {
			$db->where("group_id" , $groups[$i]['id']);
			$group_products = $db->get("products");
			if(count($group_products)  == 0 || !isset($group_products))
				continue;
			for($j = 0 ; $j < count($group_products) ; $j++) {
				$db->where("album_id" , $album_data['id']);
				$db->where("product_id" , $group_products[$j]['id']);
				if( ! $db->has("album_product") ) {
					continue;
				}

				$log_data['picture_1'] = $group_products[$j]['picture_1'];
				$log_data['picture_2'] = $group_products[$j]['picture_2'];
				$log_data['code'] = $group_products[$j]['group_id'] . "-" . ($j + 1);
				$log_data['log_id'] = $id;
				$db->insert("panel_album_temp" , $log_data);
				$string .= get_product_info($group_products[$j]);
				// product seperator
				// if($j != count($group_products) - 1)
					$string .= "#";
			}
			// group seperator
			// if($i != count($groups) - 1)
				$string .= "&";
		}
		// end flag
		$string .= "@";
		// $string = str_replace("&@" , "@" , $string);
		// $string = str_replace("*@" , "@" , $string);
		echo strip_tags(trim(($string)));
		write_log($string);
	}

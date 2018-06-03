<?php  

	function insert_panels_log($panel_id , $request_type) {
		global $db;
		// $db->where("panel_id" , $panel_id);
		// $db->Where("request_type" , $request_type);
		// $db->delete("panels_log");
		$data['panel_id'] = $panel_id;
		$data['request_type'] = $request_type;
		$data['created_at'] = $db->now();
		$db->where("panel_id" , $panel_id);
		$db->where("request_type" , $request_type);
		if($db->has("panels_log")) {
			$db->where("panel_id" , $panel_id);
			$db->where("request_type" , $request_type);
			$db->update("panels_log" , $data);			
		} else {
			$db->insert("panels_log" , $data);
		}
	}

	function get_panels_log($panel_id , $request_type) {
		global $db;
		$db->where("panel_id" , $panel_id);
		$db->Where("request_type" , $request_type);
		$data = $db->get("panels_log");
		if($data) {
			$count = count($data);
			if($count != 0) {
				return $data[$count - 1];
			} else {
				return null;
			}
		}
		return null;
	}

	function insert_table_timestamp($name="products") {
		global $db;
		$db->where("table_name" , $name);
		$db->delete("table_timestamps");
		$data['table_name'] = $name;
		$db->insert("table_timestamps" , $data);
	}

	function get_table_timestamp($name="products"){
		global $db;
		$db->where("table_name" , $name);
		$data = $db->getOne("table_timestamps");
		if($data)
			return $data;
		return null;
	}


	// returns true if new data is submited 
	function should_be_updated( $panel_id ,$table_name="products" ) {
		global $db;
		$table_data = get_table_timestamp($table_name);
		if($table_data) {
			// table data exists
			$panel_data = get_panels_log($panel_id , '2');
			if($panel_data){
				// panel data exists
				if($panel_data['created_at'] < $table_data['time'])
					return true;
				else 
					return false;
			} else {
				// no panel data found
				return true;
			}

		} else {
			// no table data found
			return false;
		}
	}


?>
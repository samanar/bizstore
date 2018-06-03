<?php

    function products_sidenav($active = "") {
        echo '<div class="side_navbar">
							<div class="side_navbar_title">
								محصولات
							</div>
							<div class="side_navbar_item'.(($active == "add") ? " side_navbar_item_active" : "").'">
								<a href="'.(($active != "") ? "." : "").'./create">افزودن محصول جدید </a>
							</div>
							<div class="side_navbar_item'.(($active == "show") ? " side_navbar_item_active" : "").'">
								<a href="'.(($active != "") ? "." : "").'./show">نمایش اطلاعات محصول</a>
							</div>
							<div class="side_navbar_item'.(($active == "edit") ? " side_navbar_item_active" : "").'">
								<a href="'.(($active != "") ? "." : "").'./edit">ویرایش اطلاعات محصول</a>
							</div>
						</div>';
    }

    function navbar() {
    	echo '
    	<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

	<!-- navbar logo -->
	<a href="#" class="navbar-brand">logo</a>

	<!-- toggler button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsebleNavbar">
		
	</button>



	<!-- navbar links -->
	<div class="collapse navbar-collapse" id="collapsebleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="../../groups" class="nav-link">گروه ها</a>
			</li>

			<li class="nav-item">
				<a href="../../products" class="nav-link">محصولات</a>
			</li>
			
			<li class="nav-item">
				<a href="../../demos" class="nav-link">دمو ها</a>
			</li>

			<li class="nav-item">
				<a href="../../questions" class="nav-link">سوال ها</a>
			</li>

			<li class="nav-item">
				<a href="../../comments" class="nav-link">کامنت ها</a>
			</li>

		</ul>
	</div>

</nav>';
    }

    function navbar_one() {
    	echo '
    	<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">

	<!-- navbar logo -->
	<a href="#" class="navbar-brand">logo</a>

	<!-- toggler button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsebleNavbar">
		
	</button>



	<!-- navbar links -->
	<div class="collapse navbar-collapse" id="collapsebleNavbar">
		<ul class="navbar-nav">

			<li class="nav-item">
				<a href="../groups" class="nav-link">گروه ها</a>
			</li>

			<li class="nav-item">
				<a href="../products" class="nav-link">محصولات</a>
			</li>
			<li class="nav-item">
				<a href="../demos" class="nav-link">دمو ها</a>
			</li>

			<li class="nav-item">
				<a href="../questions" class="nav-link">سوال ها</a>
			</li>

			<li class="nav-item">
				<a href="../comments" class="nav-link">کامنت ها</a>
			</li>
			
		</ul>
	</div>

</nav>';
    }

    function group_list($selected = "") {
    	global $db;
    	$groups = $db->get("groups");

    	if(count($groups) == 0 || $groups == null ) {
    		echo '<option value="" >هیچ گروهی ثبت نشده است </option>';
    		return;
    	}
    	echo '<option value="">گروه مورد نظر خود را انتخاب کنید</option>';
    	foreach ($groups as $key => $value) {
    		echo '<option value="'.$value['id'].'"';
    		if($selected == $value['id'])
    			echo 
    			' selected="selected"';
    		echo '>';
    		echo $value['name'];
    		echo '</option>';
    	}
    }

    function model_list($group_id , $selected="") {
    	global $db;
    	$db->where("group_id" , $group_id);
    	$models = $db->get("models");

    	if($models == null || count($models) == 0 ) {
    		echo '<option value="">هیچ کدلی برای گروه مورد نظر ثبت نشده است</option>';
    		return;
    	}
		echo '<option value="">مدل مورد نظر خود را وارد کنید</option>';
    	foreach ($models as $key => $value) {
    		echo '<option value="'.$value['id'].'"';
    		if($selected == $value['id'])
    			echo ' selected="selected"'; 
    		echo '>';
    		echo $value['name'];
    		echo '</option>';
    	}
    }

    function show_data_entry_tabs($active="") {
    	echo '<ul class="nav nav-tabs">';
    	

    	// echo '<li class="nav-item"><a href="./index.php?page=data_entry_partitions" class="nav-link ';
    	// if($active == "partitions")
    	// 	echo "active";
    	// echo '">بخش ها</a></li>';	

    	echo '<li class="nav-item"><a href="./index.php?page=data_entry_groups" class="nav-link ';
    	if($active == "groups")
    		echo "active";
    	echo '">گروه ها</a></li>';	

    	echo '<li class="nav-item"><a href="./index.php?page=data_entry_products" class="nav-link ';
    	if($active == "products")
    		echo "active";
    	echo '">محصولات</a></li>';	

    	echo '<li class="nav-item"><a href="./index.php?page=data_entry_albums" class="nav-link ';
    	if($active == "albums")
    		echo "active";
    	echo '">آلبوم ها</a></li>';	

    	echo '<li class="nav-item"><a href="./index.php?page=data_entry_questions" class="nav-link ';
    	if($active == "questions")
    		echo "active";
    	echo '">سوالات</a></li>';	

    	echo '</ul>';
    }

    function product_select_list($list=[]){
        global $db;
        $products = $db->get("products");
        if(!$products || count($products) == 0) {
            // echo '<option value="">هیچ محصولی در سیستم ثبت نشده است</option>';
            return;
        }
        // var_dump($list);
        $groups = $db->get("groups");
        foreach ($groups as $key => $value) {
            $db->where("group_id" , $value['id']);
            $group_products = $db->get("products");
            echo '<optgroup label="';
            echo $value['name'];
            echo '">';
            foreach ($group_products as $key2 => $value2) {
                echo '<option value="'.$value2['id'].'"';
                foreach ($list as $key3 => $value3) {
                    if($value2['id'] == $value3['product_id']){
                        echo ' selected="selected" ';
                    }
                }
                echo '>'.$value2['name'].'</option>';
            }
            echo '</optgroup>';
        }

        $db->where("group_id" , 0);
        $null_products = $db->get("products");
        // echo "null";
        // var_dump($null_products);
        if($null_products){
            echo '<optgroup label="سایر">';
            foreach ($null_products as $key2 => $value2) {
                echo '<option value="';
                echo $value2['id'];
                echo '"';
                foreach ($list as $key3 => $value3) {
                    if($value2['id'] == $value3['product_id']){
                        echo ' selected="selected" ';
                    }
                }
                echo '>'.$value2['name'].'</option>';
            }
            echo '</optgroup>';
        }

    }

    function partitions_select_list($list = []) {
        global $db;
        $partitions = $db->get("partitions");
        if($partitions == null || count($partitions) == 0){
            // echo '<option>هیچ بخشی در سیستم ثبت نشده است</option>';
            return;
        }
        foreach ($partitions as $key => $value) {
            echo '<option value="'.$value['id'].'"';
            foreach ($list as $key2 => $value2) {
                if($value2['partition_id'] == $value['id']) {
                    echo ' selected="selected"';
                }
            }
            echo '>'.$value['name'];
            echo '</option>';
        }
    }

    function level_select_list($selected = 0) {
        
        // superadministrator 

        if($selected == 1) {
            echo '<option value="1" selected="selected">ادمین</option>';
        } else {
            echo '<option value="1">ادمین</option>';
        }

        if($selected == 2) {
            echo '<option value="2" selected="selected">عمومی</option>';
        } else {
            echo '<option value="2">عمومی</option>';
        }

        if($selected == 3) {
            echo '<option value="3" selected="selected">مهمان</option>';
        } else {
            echo '<option value="3">مهمان</option>';
        }        
    }

    function translate_group($id) {
        global $db;
        $db->where("id" , $id);
        return $db->getOne("groups")['name'];
    }

    function translate_level($level) {
        $level_string = "";
        switch ($level) {
            case '1':
                $level_string = "ادمین";
                break;

            case '2':
                $level_string = "عمومی";
                break;

            case '3':
                $level_string = "مهمان";
                break;
            
            default:
                $level_string = "error";
                break;
        }
        return $level_string;
    }


?>
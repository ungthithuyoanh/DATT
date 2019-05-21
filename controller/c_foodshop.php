<?php
	require_once('../model/m_foodshop.php');
	// require_once('../view/index.php');
	$foodshop = new FoodShop();

	//tìm kiếm theo địa chỉ
	if(isset($_POST['diachi'])){
		$dia_chi = $_POST['diachi'];
	}
	else {
		$dia_chi = null;
	}
	// $timkiem = $foodshop->queryLimitFoodShop($sql,$dia_chi);
	//phân trang
	$total_page = $foodshop->countRowFoodShop();
	$total_page = $total_page["total"];
	$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

	$limit = 6;//6
	$total_page = ceil($total_page / $limit); //hàm làm tròn lên.vd 2,3=3
	//kiểm tra nhập page
	if ($current_page > $total_page) {
		$current_page = $total_page;
	}
	if ($current_page < 1) {
		$current_page = 1;
	}
	//tính start
	$start = ($current_page - 1 ) * $limit;
	$sql= "LIMIT ".$start." , ".$limit;
	$data = $foodshop->queryLimitFoodShop($sql,$dia_chi);

	// require_once('../view/index.php');
	require_once('../view/v_foodshop.php');
?>
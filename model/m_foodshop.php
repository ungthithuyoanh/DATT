<?php 
require_once('connect/database.php');
	/**
	 * summary
	 */
	class FoodShop extends Database
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	parent::__construct();
	    }

	 //    function queryFoodShop($diachi){

	 //    	$conn = parent::getConn();
	 //    	$stmt = null;
	 //    	if($diachi == null){
	 //    		$diachi = '1=1';
	 //    	}
	 //    	try {
	 //    		$stmt = $conn->prepare("SELECT * FROM foodshop  WHERE ".$diachi);
	 //    		$stmt->execute();
	 //    	} catch (PDOException $e) {
	 //    		echo "No foodshop: ".$e->getMessage();
	 //    	}

	 //    	if( $stmt->rowCount() == 0 ){ //không có
	 //    		$stmt=null;
	 //    		$conn=null;
	 //    		return 0;
		//     }else{ //có
		//     	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//     	$stmt=null;
		//     	$conn=null;
		//     	return $data;
		//     }
		// }
		function countRowFoodShop(){
			$conn = parent::getConn();
	    	$stmt = null;

	    	try {
	    		$stmt = $conn->prepare("SELECT count(id) as total FROM foodshop");
	    		$stmt->execute();
	    	} catch (PDOException $e) {
	    		echo "No foodshop: ".$e->getMessage();
	    	}

	    	if( $stmt->rowCount() == 0 ){ //không có
	    		$stmt=null;
	    		$conn=null;
	    		return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function queryLimitFoodShop($sql,$diachi){
			$conn = parent::getConn();
	    	$stmt = null;
	    	if($diachi == null){
	    		$diachi = " 1 = 1 ";
	    	}
	    	else {
	    		$diachi = 'address like "%N'.$diachi.'%" ';
	    	}
	    	$sql= "SELECT * FROM foodshop WHERE".$diachi . $sql;
	    	try {
	    		$stmt = $conn->prepare($sql);
	    		$stmt->execute();
	    	} catch (PDOException $e) {
	    		echo "No foodshop: ".$e->getMessage();
	    	}
	    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    	if( $stmt->rowCount() == 0 ){ //không có
	    		$stmt=null;
	    		$conn=null;
	    		return $data;
		    }else{ //có
		    	
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
	}
?>
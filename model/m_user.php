<?php 
require_once("connect/database.php");

class User extends Database
{

	public function __construct()
	{
		parent::__construct();
	}
	function queryUsername($_userName)
	{
	    //kiem tra username trong database
		$_userName = trim($_userName);
		//cat khoang trang 2 dau
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");

			$stmt->bindValue(":username", $_userName);

			$stmt->execute();

		}catch(PDOException $e){
			echo "QueryUserName failed: " . $e->getMessage();
		}

	    if( $stmt->rowCount() == 0 ){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
	    	$stmt=null;
	    	$conn=null;
	    	return 1;
	    }
	}
	function queryEmail( $_email ){
		//ktra email tồn tại hay chưa
		$_email = trim($_email);
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT email FROM users WHERE email=:email");
			$stmt->bindValue(":email", $_email);
			$stmt->execute();
			
		}catch(PDOException $e){
	    	echo "QueryEmail failed: " . $e->getMessage();
	    }
	    if($stmt->rowCount() == 0){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
		    $stmt=null;
		    $conn=null;
		    return 1;
		}
	}

	function queryUser($_login, $_pass){
		$_login = trim($_login);
		// $_pass = md5($_pass);
		
		$conn = parent::getConn();

		$sql = 'SELECT id,username,name,password,email, verified, role, crtime FROM users where ( username=:login OR email=:login ) AND password =:pass';

		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':login', $_login);
		$stmt->bindValue(':pass', $_pass);

		$stmt -> execute();

		$row = $stmt->rowCount();

		if( $row == 0){
			$stmt=null;
			$conn=null;
			return 0;
		}else{
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt=null;
		    $conn=null;
			return $data;
		}
	}
	public function insertUser($userArr=array()){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('INSERT INTO users (username, password, name, email, sex, birthday, phone, address,  vkey) VALUES ( ?, ?, N'.'?'.', ?, ?, ?, ?, ?, ?)');
			$stmt->execute( $userArr );
			$stmt=null;
			$conn=null;
			return true;
		}catch(PDOException $e){
	    	echo "Lỗi insert: " . $e->getMessage();
	    }
		$stmt=null;
		$conn=null;
		return false;
	}
	function queryVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT vkey, verified FROM users WHERE vkey=:vkey AND verified=0 LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "QueryVirified failed: " . $e->getMessage();
	    }
	    if($stmt->rowCount() == 0){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
		    $stmt=null;
		    $conn=null;
		    return 1;
		}
	}
	function updateVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET verified=1 WHERE vkey=:vkey LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "UpdateVerified failed: " . $e->getMessage();
	    }
	    if($stmt->rowCount() == 0){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
		    $stmt=null;
		    $conn=null;
		    return 1;
		}
	}
}
?>
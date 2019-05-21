<?php 
require_once("../view/header.php");

	// kiểm tra đã đăng nhập chưa
if(isset($_SESSION['name']) || isset($_SESSION['id'])){
		header('location:index.php'); //đăng nhập rồi
	}
	// phần xử lý khi chưa đăng nhập

	//biến chưa nội dung lỗi khi đăng nhập
	$errLogin = null; 
	$errPassword = null;
	$verifiErr = null;
	//start login
	// khi có yêu cầu đăng nhập
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$login = $_POST['login'];
		$pass = $_POST['password'];

		require_once("../model/m_user.php");

		$mUser = new User();

		$hadUsername = $mUser->queryUsername($login);
		$hadEmail = $mUser-> queryEmail($login);

		if($hadUsername || $hadEmail){
			$hadUser = $mUser->queryUser($login, $pass);
			if($hadUser){
				if($hadUser['verified'] == 0){
					//chưa xác nhận tài khoản
					$date = date_create($hadUser['crtime']);
					$date = date_format($date, 'H:i:s \, d-m-Y');
					// $errLogin = "<script>$('#login').val('$login')</script>";
					$verifiErr = "Tài khoản chưa được xác nhận! Chúng tôi đã gửi email xác nhận đến ".$hadUser['email']." vào lúc ".$date;
				}
				else{//đã xác nhận tài khoản
					$_SESSION['id'] = $hadUser['id'];

					$_SESSION['name'] = $hadUser['name'];

					header('location:../index.php');
				}	
			}else{
				$errPassword = 'Mật khẩu không chính xác';
				// $errLogin = "<script>$('#login').val('$login')</script>";
			}
		}else{
			$errLogin = 'Tên đăng nhập/Email không chính xác!';
		}

	}
	require_once("../view/v_login.php");
	require_once("../view/footer.php");
	?>
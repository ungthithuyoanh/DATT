<?php 
require_once("m_user.php");

class Validation
{
	
	public function __construct()
	{

	}
	function checkUserName($userName){
        //check name
        if (empty($userName)){
            return "Vui lòng nhập tài khoản!";
        }else{
            
            $mUser = new User();
            $had = $mUser->queryUserName($userName);

            if($had == 1){
                return "Tài khoản đã tồn tại!";
            }
        }
        return null;
    }
    function checkName($name){
        if (empty($name)){
            return "Vui lòng nhập họ tên!";
        }
        return null;
    }
    function checkEmail($email){
        if (empty($email)){
            return "Vui lòng nhập email!";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Email không hợp lệ!";
        }else{
            $mUser = new User();
            $had = $mUser->queryEmail($email);
            if($had == 1){
                return "Email đã tồn tại!";
            }
        }
        return null;
    }
	function checkPass($pass){
        if (empty($pass)){
            return "Vui lòng nhập mật khẩu!";
        }
        return null;
    }
    function checkPass2($pass, $pass2){
        if (empty($pass2)){
            return "Vui lòng nhập lại mật khẩu!";
        }elseif((strcmp($pass, $pass2)) != 0){
            return "Nhập lại mật khẩu không đúng!";
        }
        return null;
    }

	//hacker insert js vafo database
    function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
    }
}
?>
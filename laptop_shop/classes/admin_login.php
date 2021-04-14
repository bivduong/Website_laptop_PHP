<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class adminlogin
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser,$adminPass){
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if(empty($adminUser) || empty($adminPass)){
				
			}else{
	$query = "SELECT * FROM account WHERE User = '$adminUser' AND password = '$adminPass' and Matk NOT IN ( '3' ) ";
				$result = $this->db->select($query);

				if($result != false){

					$value = $result->fetch_assoc();

					Session::set('adminlogin', true);

					Session::set('adminId', $value['id']);
					Session::set('adminUser', $value['User']);
					Session::set('adminName', $value['name']);
					Session::set('admintk', $value['Matk']);
					header('Location:index.php');

			//$row = mysqli_num_rows($result);
// 		while(!$value){//hay là do đoạn if $value tin hèo

// 	if($value['Matk'] == '1'){        
//                 	$_SESSION['admin'] = true;   // à chỗ hello bi hồi nãy á, bi dùng gì để hiện ra á là sao cái tên hà? lag r hihu      Session::get : cái này dhufng là gì á Bi tạo 1 class sesstion á tin xong get là lấy ra

//                 }else{
//                     $_SESSION['admin'] = false;
//                 }

//                 if($value['Matk'] == 2) 
//                 {
//                    $_SESSION['banhang'] = true;
//                 }else{
//                     $_SESSION['banhang'] = false;
//                 }
// }		

				
			}else{
				$alert="User and pass not pas";
				return $alert;
			}
		}


	}
	
}
?>
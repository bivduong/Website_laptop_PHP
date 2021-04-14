<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php
class customer
	{

		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$user = mysqli_real_escape_string($this->db->link, $data['user']);
			$i=3;
			if($name==""  || $email=="" || $address=="" || $country=="" || $phone =="" || $password =="" || $user==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM account WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email Already Existed ! Please Enter Another Email</span>";
					return $alert;
				}else{
					$query = "INSERT INTO account(name,email,address,country,phone,User,password,Matk) VALUES('$name','$email','$address','$country','$phone','$user','$password','$i')";
					$result = $this->db->insert($query);
					if($result){
					
						$alert = "<span class='success'>Customer Created Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Customer Created Not Successfully</span>";
						return $alert;
					}
				}
			}
		}
		public function login_customers($data){
			$email = mysqli_real_escape_string($this->db->link, $data['user']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($email=='' || $password==''){
				$alert = "<span class='error'style='text-align:center;'>Password and Email must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM account WHERE user='$email' AND password='$password' and Matk='3'";
				$result_check = $this->db->select($check_login);
				if($result_check){
					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$value['name']);
					
					header('Location:order.php');
				}else{
					$alert = "<span class='error'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
			public function show_customers($id)
		{
			$query = "SELECT * FROM account WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_pass($data, $id)
		{
			$password = mysqli_real_escape_string($this->db->link, md5($data['old_password']));
			$new_password = mysqli_real_escape_string($this->db->link, md5($data['new_password']));
			$password_1= mysqli_real_escape_string($this->db->link, md5($data['upda_password']));
			
			if($password==""  || $new_password=="" || $password_1=="" ){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else if($new_password !=$password_1){

				$alert = "<span class='error'>Mật khẩu mới không đúng</span>";
				return $alert;
			}
			else{
				$query = "UPDATE account SET password='$new_password' WHERE id='$id' ";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Khách hàng Updated thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Khách hàng Updated Not thành công</span>";
						return $alert;
				}
				
			}
		}
		public function insert_payment($data, $id)
		{
			$customer_id = mysqli_real_escape_string($this->db->link, $id);
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
			$total = mysqli_real_escape_string($this->db->link, $data['total']);
			
			if($name==""   || $address=="" || $quantity=="" || $total==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO payment(customer_id,Name,adress,quantity,total) VALUES('$customer_id','$name','$address','$quantity','$total')";
					$result = $this->db->update($query);
					if($result){
					
						$alert = "<span class='success'>Customer Created Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Customer Created Not Successfully</span>";
						return $alert;
					}
				
			}
		}
		public function show_payment($id)
		{
			$query = "SELECT * FROM payment WHERE customer_id='$id' ";
			$result = $this->db->select($query);
			return $result;

		}
		public function show_payment_details()
		{
			$query = "SELECT account.name,account.address,account.email,count(*) as sanphamdamua, date(order_cus.date_order) as weekNum,sum(order_cus.price) as tongtien
FROM order_cus,account WHERE account.id=order_cus.customer_id
GROUP BY YEARWEEK(order_cus.date_order)  ";
			$result = $this->db->select($query);
			return $result;

		}
			public function del_payment($id){
			$query = "DELETE FROM payment where id = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Product Deleted Not Success</span>";
				return $alert;
			}
			
		}
			public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name==""  || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE account SET name='$name',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Khách hàng Updated thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Khách hàng Updated Not thành công</span>";
						return $alert;
				}
				
			}
		}
		
}

?>

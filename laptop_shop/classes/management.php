<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
/**
 * 
 */
class management 
{
	
	private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
public function count_product(){
	$query="SELECT * FROM product";
$result = $this->db->select($query);

return $result;
}
public function count_product_loai()
{
	$query="SELECT product.*, brand.brandName,brand.brandId,COUNT(*) as 'so lieu'from product,brand where product.brandId=brand.brandId group by product.brandId,brand.brandName";
$result = $this->db->select($query);

return $result;

}
public function show_customer(){
	$query="SELECT * from account where Matk='3'";
	$result = $this->db->select($query);

return $result;
}
public function total_product()
{
	$query="SELECT SUM(price) as'value_sum'from order_cus ";
	$result = $this->db->select($query);

return $result;
}
public function coun_order()
{
	$query="SELECT * from order_cus ";
	$result = $this->db->select($query);
	return $result;
}
public function show_adm()
{
	$query="SELECT * from account where Matk='1'";
	$result = $this->db->select($query);
	return $result;
}
public function show_admin()
{
	$query="SELECT * from account where Matk='2'";
	$result = $this->db->select($query);
	return $result;
}
public function show_admin_details($id)
{
	$query="SELECT * from account where id='$id' and Matk='2'";
	$result = $this->db->select($query);
	return $result;
}
	public function del_admin($id)
		{
			$query = "DELETE FROM account where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa nhân viên thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Xóa nhân viên thất bại</span>";
				return $alert;
			}
		}
			public function insert_admin($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$user = mysqli_real_escape_string($this->db->link, $data['user']);
			$con = mysqli_real_escape_string($this->db->link, $data['country']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$i=2;
			if($name==""  || $email=="" || $address=="" || $user=="" || $phone =="" || $password =="" || $con==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				
					$query = "INSERT INTO account(name,email,phone,address,country,User,password,Matk) VALUES('$name','$email','$phone','$address','$con','$user','$password','$i')";
					$result = $this->db->insert($query);
					if($result){
					
						$alert = "<span class='success'>Đã thêm thành công 1 nhân viên</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm thất bại</span>";
						return $alert;
					}
				
			}
		}
				public function update_admin_pass($data,$id)
		{
			$newpass = mysqli_real_escape_string($this->db->link,md5($data['changepass']));
			
			if(empty($newpass)){
				$alert = "<span class='error'>Không được để trống mật khẩu</span>";
				return $alert;
			}else{
				$query = "UPDATE account SET password= '$newpass' WHERE id = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Admin Update Successfully</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Update Admin NOT Success</span>";
					return $alert;
				}
			}

		}
		public function show_product_top1()
{
	$query="SELECT order_cus.*, COUNT(productId) as mn FROM order_cus GROUP by productId having mn>=(SELECT max(mn) FROM (SELECT COUNT(productId) AS mn FROM order_cus GROUP BY productId) order_cus) limit 1";
	$result = $this->db->select($query);
	return $result;
}
	public function product_rating()
{
	$query="SELECT product.*, AVG(ratingNumber) AS jt
FROM item_rating,product WHERE item_rating.productId=product.productId
GROUP BY productId HAVING jt >= 4 and jt<=5  " ;
	$result = $this->db->select($query);
	return $result;
}
public function comment_product(){
	$query="SELECT * from item_rating,account,product where item_rating.userId = account.id and item_rating.productId=product.productId order by ratingId desc limit 2";
	$result = $this->db->select($query);
	return $result;
}
public function comment_product_full(){
	$query="SELECT * from item_rating,account,product where item_rating.userId = account.id and item_rating.productId=product.productId order by ratingId desc ";
	$result = $this->db->select($query);
	return $result;
}
public function del_comment($id)
		{
			$query = "DELETE FROM item_rating where ratingId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xóa  thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Xóa  thất bại</span>";
				return $alert;
			}
		}
		public function show_date_price(){
	$query="SELECT  year(date_order) as 'nam',month(date_order) as 'tuan', SUM(price) as 'tongtien' FROM order_cus Group by MONTH(date_order)";
	$result = $this->db->select($query);
	return $result;
}
public function show_product_comment(){
	$query="SELECT product.productName, AVG(item_rating.ratingNumber) as 'trungbinhsao', COUNT(item_rating.userId) as'sbl' from product,item_rating WHERE product.productId=item_rating.productId GROUP by item_rating.productId";
	$result = $this->db->select($query);
	return $result;
}
public function show_warehouse(){
	$query="SELECT *from product group by productId desc";
	$result = $this->db->select($query);
	return $result;
}

}
?>
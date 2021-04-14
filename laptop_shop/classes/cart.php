<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');

?>

<?php
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($id,$quantity,$quantity1){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$quantity1 = $this->fm->validation($quantity1);
			$quantity1 = mysqli_real_escape_string($this->db->link, $quantity1);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM product WHERE productId = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();

			echo print_r($result);
$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];
			
			
				$query_insert = "INSERT INTO cart(productId,productName,quantity,sId,price,image,product_remain) VALUES('$id','$productName','$quantity','$sId','$price','$image','$quantity1' ) ";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					header('Location:cart.php');
				}else {
					header('Location:error.php');
				}
			
			
		}
		


		public function get_product_cart(){
			$sid = session_id();
			$query = "SELECT * FROM cart WHERE sId = '$sid'";
			$result = $this->db->select($query);
			return $result;
		}
	public function update_quantity_cart($quantity, $cartId,$quantity1){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$quantity1 = mysqli_real_escape_string($this->db->link, $quantity1);
			if($quantity<=$quantity1){
			$query = "UPDATE cart SET

					quantity = '$quantity'

					WHERE cartId = '$cartId'";
			$result = $this->db->update($query);

			if($result){
				header('Location:cart.php');
			}}else{
				$msg = "<span class='error' style='color:red;'>Product Quantity Updated Not Successfully</span>

				";
				return $msg;
			}
		
		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				
				header('Location:cart.php');
			}else{
				$msg = "<span class='error'>Product Deleted Not Successfully</span>";
				return $msg;
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function del_all_data_cart(){
			$sId = session_id();
			$query = "DELETE FROM cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_compare($customer_id){
			$sId = session_id();
			$query = "DELETE FROM compare WHERE customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function insertOrder($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO order_cus(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);
				}
				
			}
			
		
			
		}
		public function check_order($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM order_cus WHERE customer_id = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getAmountPrice($customer_id){
		
			$query = "SELECT price FROM order_cus WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM order_cus WHERE customer_id = '$customer_id' order by id desc ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart()
		{
			$query = "SELECT order_cus.*, order_cus.customer_id,account.name from order_cus,account where order_cus.customer_id=account.id order by order_cus.customer_id desc";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		
		public function shifted($id,$proid,$qty,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$proid = mysqli_real_escape_string($this->db->link, $proid);
			$qty = mysqli_real_escape_string($this->db->link, $qty);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query_select = "SELECT * FROM product WHERE productId='$proid'";
			$get_select = $this->db->select($query_select);

			if($get_select){
				while($result = $get_select->fetch_assoc()){
					$soluong_new = $result['product_remain'] - $qty;
					$qty_soldout = $result['product_soldout'] + $qty;

					$query_soluong = "UPDATE product SET

					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
					$result = $this->db->update($query_soluong);
				}
			}

			$query = "UPDATE order_cus SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Update Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM order_cus 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> DELETE Order Succesfully</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE order_cus SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

			$result = $this->db->update($query);
			return $result;
		}
		
		


	}
?>
<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	/**
	* 
	*/
	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_product($data,$files){

			
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			$product_codes = mysqli_real_escape_string($this->db->link, $data['product_code']);

			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_name1 = $_FILES['image1']['name'];
			$file_name2 = $_FILES['image2']['name'];
			$file_name3 = $_FILES['image3']['name'];
			$file_size = $_FILES['image']['size'];
			$file_size1 = $_FILES['image1']['size'];
			$file_size2= $_FILES['image2']['size'];
			$file_size3 = $_FILES['image3']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
$file_temp1 = $_FILES['image1']['tmp_name'];
$file_temp2 = $_FILES['image2']['tmp_name'];
$file_temp3 = $_FILES['image3']['tmp_name'];
			$div = explode('.', $file_name);
			$div1 = explode('.', $file_name1);
			$div2= explode('.', $file_name2);
			$div3 = explode('.', $file_name3);
			$file_ext = strtolower(end($div));
			$file_ext1 = strtolower(end($div1));
			$file_ext2 = strtolower(end($div2));
			$file_ext3 = strtolower(end($div3));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$unique_image1 = substr(md5(time()), 0, 11).'.'.$file_ext1;
			$unique_image2 = substr(md5(time()), 0, 12).'.'.$file_ext2;
			$unique_image3 = substr(md5(time()), 0, 13).'.'.$file_ext3;
			$uploaded_image = "upload/".$unique_image;
			$uploaded_image1 = "upload/".$unique_image1;
			$uploaded_image2= "upload/".$unique_image2;
			$uploaded_image3= "upload/".$unique_image3;
			if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name ==""||$product_code ='' || $productQuantity == "" ){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				move_uploaded_file($file_temp1,$uploaded_image1);
				move_uploaded_file($file_temp2,$uploaded_image2);
				move_uploaded_file($file_temp3,$uploaded_image3);
				$query = "INSERT INTO product(productName,product_code,productQuantity,product_remain,catId,brandId,product_desc,price,type,image,image1,image2,image3) VALUES('$productName','$product_codes','$productQuantity','$productQuantity','$category','$brand','$product_desc','$price','$type','$unique_image','$unique_image1','$unique_image2','$unique_image3')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Product Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Product Not Success</span>";
					return $alert;
				}
			}
		}
		public function show_product(){
			

			$query = " SELECT * FROM product order by productId desc";

			

			$result = $this->db->select($query);
			return $result;
		}
		public function update_product($data,$files,$id){

		
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$product_codes = mysqli_real_escape_string($this->db->link, $data['product_code']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$categorys = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_name1 = $_FILES['image1']['name'];
			$file_name2 = $_FILES['image2']['name'];
			$file_name3 = $_FILES['image3']['name'];
			$file_size = $_FILES['image']['size'];
			$file_size1 = $_FILES['image1']['size'];
			$file_size2 = $_FILES['image2']['size'];
			$file_size3 = $_FILES['image3']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			$file_temp1 = $_FILES['image1']['tmp_name'];
			$file_temp2 = $_FILES['image2']['tmp_name'];
			$file_temp3 = $_FILES['image3']['tmp_name'];

			$div = explode('.', $file_name);
			$div1 = explode('.', $file_name1);
			$div2 = explode('.', $file_name2);
			$div3 = explode('.', $file_name3);
			$file_ext = strtolower(end($div));
			$file_ext1 = strtolower(end($div1));
			$file_ext2 = strtolower(end($div2));
			$file_ext3 = strtolower(end($div3));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$unique_image1 = substr(md5(time()), 0, 11).'.'.$file_ext1;
			$unique_image2 = substr(md5(time()), 0, 12).'.'.$file_ext2;
			$unique_image3 = substr(md5(time()), 0, 13).'.'.$file_ext3;
			$uploaded_image = "upload/".$unique_image;
			$uploaded_image1 = "upload/".$unique_image1;
			$uploaded_image2 = "upload/".$unique_image2;
			$uploaded_image3 = "upload/".$unique_image3;


			if($product_codes == "" || $productName=="" || $productQuantity=="" || $brand=="" || $categorys=="" || $product_desc=="" || $price=="" || $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 1000480) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					move_uploaded_file($file_temp1,$uploaded_image1);
					move_uploaded_file($file_temp2,$uploaded_image2);
					move_uploaded_file($file_temp3,$uploaded_image3);
					$query = "UPDATE product SET
					productName = '$productName',
					product_code = '$product_codes',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$categorys', 
					type = '$type', 
					price = '$price', 
					image = '$unique_image',
					image1 = '$unique_image1',
					image2 = '$unique_image2',
					image3 = '$unique_image3',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE product SET

					productName = '$productName',
					product_code = '$product_codes',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$categorys', 
					type = '$type', 
					price = '$price', 
					
					product_desc = '$product_desc'

					WHERE productId = '$id'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='success'>Product Updated Successfully</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Product Updated Not Success</span>";
						return $alert;
					}
				
			}

		}
		public function getproductbyId($id){
			$query = "SELECT * FROM product where productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
			public function del_product($id){
			$query = "DELETE FROM product where productId = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Product Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Product Deleted Not Success</span>";
				return $alert;
			}
			
		}
		public function getproduct_featheread()
		{
			$query = "SELECT * FROM product where type = '1' order by productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;
		}
			public function get_details($id)
		{
			$query = 
			
			" SELECT *FROM product where productId='$id'";

			$result = $this->db->select($query);
			return $result;
		}
		public function show_shop()
		{
			$sp_tung_trang=6;
			if(!isset($_GET['trang']))
			{
				$trang=1;
			}else{
				$trang=$_GET['trang'];
				}		
					$tung_trang=($trang-1)*$sp_tung_trang;
			$query="SELECT*from product order by productId desc  LIMIT $tung_trang,$sp_tung_trang ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_all_product(){

		$query="SELECT*from product";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_wlist($proid,$customer_id)
		{
			$query = "DELETE FROM wishlist where productId = '$proid' AND customer_id='$customer_id' ";
			$result = $this->db->delete($query);
			return $result;
		}

		public function get_wishlist($customer_id)
		{
			$query = "SELECT * FROM wishlist where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertWishlist($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_wlist = "SELECT * FROM wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "<span class='error'>Product Added to Wishlist</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_wlist = $this->db->insert($query_insert);

			if($insert_wlist){
						$alert = "<span class='success'>Thêm sản phẩm vào wishlist thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào wishlist thất bại</span>";
						return $alert;
					}
			}
		}
		public function insert_slider($date,$files)
		{
			$id = mysqli_real_escape_string($this->db->link, $date['productid']);
			$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
			$contact = mysqli_real_escape_string($this->db->link, $date['contact']);
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;


			if($sliderName=="" || $contact==""|| $type==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {

		    		 $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				    } 
					elseif (in_array($file_ext, $permited) === false) 
					{
				     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
				    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
					return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					
					$query = "INSERT INTO tbl_slider(sliderName,slider_contact,type,slider_image,productId) VALUES('$sliderName','$contact','$type','$unique_image','$id') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Slider Added Successfully</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Slider Added NOT Success</span>";
						return $alert;
					}
				}
				
				
			}

		}
			public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){

			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Slider Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Slider Deleted Not Success</span>";
				return $alert;
			}
		}
		public function search_all($timkiem_bn)
		 {
            $query = "SELECT * FROM product WHERE (productName LIKE '%$timkiem_bn%') or (price like'%$timkiem_bn%') ";

            $result = $this->db->select($query);
            

           

            return $result;
        }
        public function sort_desc()
		 {
            $query = "SELECT * FROM `product` ORDER BY price desc";

            $result = $this->db->select($query);
            

           

            return $result;
        }
   
         public function sort_asc()
		 {
            $query = "SELECT * FROM `product` ORDER BY price asc";

            $result = $this->db->select($query);
            

           

            return $result;
        }
        public function sort1()
		 {
            $query = "SELECT * FROM `product` WHERE price>=20000000 and price<=40000000";

            $result = $this->db->select($query);
            

           

            return $result;
        }
         public function sort2()
		 {
            $query = "SELECT * FROM `product` WHERE price>=1000000 and price<=10000000";

            $result = $this->db->select($query);
            

           

            return $result;
        }
         public function sort3()
		 {
            $query = "SELECT * FROM `product` WHERE price>=10000000 and price<=20000000";

            $result = $this->db->select($query);
            

           

            return $result;
        }
          public function sort_search($search1,$search2)
		 {
		 	
            $query = "SELECT * FROM `product` WHERE price >= '$search1' and  price <= '$search2' ";

            $result = $this->db->select($query);
            

           

            return $result;
        }

    public function show_comment_start()
    {
    	$query = "SELECT product.productName,item_rating.title, item_rating.comments,product.image From product, item_rating WHERE item_rating.productId=product.productId and item_rating.ratingNumber=5 order by product.productId limit 10" ;

            $result = $this->db->select($query);
            

           

            return $result;
    }



		public function update_quantity_product($data,$files,$id){
			$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
			$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']);
			
			if($product_more_quantity == ""){

				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert; 
			}else{
					$qty_total = $product_more_quantity + $product_remain;
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE product SET
					
					product_remain = '$qty_total'

					WHERE productId = '$id'";
					
					}
					$query_warehouse = "INSERT INTO Nhap_hang(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
					$result_insert = $this->db->insert($query_warehouse);
					$result = $this->db->update($query);

					if($result){
						$alert = "<span class='success'>Thêm số lượng thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm số lượng không thành công</span>";
						return $alert;
					}
				
		}

		public function show_product_warehouse(){
			$query = 
			"SELECT product.*, Nhap_hang.*

			 FROM product INNER JOIN Nhap_hang ON product.productId = Nhap_hang.id_sanpham
								
			 order by Nhap_hang.date_time desc ";

		
			$result = $this->db->select($query);
			return $result;
		}
		
public function get_compare($customer_id)
		{
			$query = "SELECT * FROM compare where customer_id = '$customer_id' order by id desc";
			$result = $this->db->select($query);
			return $result;	
		}
		public function insertCompare($productid, $customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
			
			$check_compare = "SELECT * FROM compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);

			if($result_check_compare){
				$msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];

			
			
			$query_insert = "INSERT INTO compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if($insert_compare){
						$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
						return $alert;
					}
			}

		}
			public function show_slider_new(){
			$query = 
			"SELECT tbl_slider.*, Max(sliderId) as LastID FROM tbl_slider where type='1'";

		
			$result = $this->db->select($query);
			return $result;
		}

		
	}
 ?>    

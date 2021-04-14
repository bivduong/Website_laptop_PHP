<?php 

	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
	   ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_ids = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_ids);
       $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
        
      
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    	$cs=new customer();
      $customer_id = Session::get('customer_id');
        $insertCustomers = $cs->insert_payment($_POST,$customer_id);      
      
    }

 ?>

  <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Thanh toán</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section padding_layout_1 checkout_section">
	<div class="container">
		
<div class="row">
      <div class="col-md-6">
        <div class="checkout-form">
          <form action="" method="POST">
            <fieldset>
        	  	<?php
        if(isset($insertCustomers)){
          echo $insertCustomers;
        }
        ?>
			    	
						<table class="table">
							<tbody>
							<tr>
								<th width="5%">Stt</th>
								<th width="15%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								
							</tr>
							</tbody>
							<?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
							<tr>
								<th><?php echo $i; ?></th>
								<th><?php echo $result['productName'] ?></th>
								
								<th><?php echo $result['price'].' VND' ?></th>
								<th>
									<?php echo $result['quantity'] ?>

								</th>
								<th>
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $total.' VND';
									 ?>
								</th>
								
							</tr>
							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng giá : </th>
								<th>
								<?php echo $subtotal.' VND';

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</th>

							</tr>
							<tr>
								<th>Số lượng</th>
								<th><input type="text" name="quantity" value="<?php echo $qty; ?>" style="border: none;"></th>
							</tr>
							<tr>
								
								<th>Phí vận chuyển : </th>
								
								<th>30.000 VND </th>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<th><?php 
								$phi = 30000;
								$grandTotal = $subtotal + $phi ;
								
								 ?> 
<input type="text" name="total" value="<?php echo $grandTotal.' VND'; ?>" style="border: none;">
								</th>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Your cart is Empty ! Please Shopping now';
						}
					    ?>
            </fieldset>
          
        </div>
      </div>
    
      <div class="col-md-6">
        <div class="payment-form">
          <div class="col-xs-12 col-md-12">
            <!-- CREDIT CARD FORM STARTS HERE -->
            <h4>Thông tin người nhận</h2>
           	<table class="table">
		    		<?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->show_customers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
		    		<tr>
		    			<th>Tên</th>
		    			<th>:</th>
		    			<th ><input type="text" name="name" value="<?php echo $result['name']; ?>" style="border: none;"></th>
		    		</tr>
		    		
		    		<tr>
		    			<th>Số điện thoại</th>
		    			<th>:</th>
		    			<th><?php echo $result['phone']; ?></th>
		    		</tr>
		    		<!-- <tr>
		    			<th>Country</th>
		    			<th>:</th>
		    			<th><?php echo $result['country']; ?></th>
		    		</tr> -->
		    		
		    		<tr>
		    			<th>Email</th>
		    			<th>:</th>
		    			<th><?php echo $result['email']; ?></th>
		    		</tr>
		    		<tr>
		    			<th>Địa chỉ</th>
		    			<th>:</th>
		    			<th><input type="text" name="address" value="<?php echo $result['address']; ?>" style="border: none;"></th>
		    		</tr>
		            <tr>
		                <th colspan="3" ><a href="editprofile.php"><b>Cập nhật thông tin</b></a></th>
		               
		            </tr>
		    		
		    		<?php 
		    		}
		    		}
		    		 ?>
		    	</table>
            <!-- CREDIT CARD FORM ENDS HERE -->
          </div>
        </div>
      </div>
    </div>


	</div>
</div>
<p>Bước 1: Vui lòng nhấn vào đây để lưu đơn hàng của bạn</p>
<center><button  name="submit" class="btn sqaure_bt" onclick="alert('Bạn đã xác nhận đơn hàng của mình')">Xác nhận đơn hàng</button></center>
<p>Bước 1: Vui lòng nhấn vào đây để lưu đơn hàng của bạn</p>
<center><a href=" ?orderid=order" style="color: white;"><button class="btn sqaure_bt" style="margin-bottom: 50px;" >Đặt Hàng</a></button></center>


</form>


<?php 
	include 'inc/footer.php';
 ?>
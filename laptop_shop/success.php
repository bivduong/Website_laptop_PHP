<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
    if(isset($_GET['oderid']) AND $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
 ?>

<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Đặt hàng thành công!</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li>Pages</li>
                <li class="active">Đặt hàng thành công</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form action="" method="POST">
 <div class="section padding_layout_1 checkout_section">
    <div class="content">
    	<div class="section group">
    		
            <?php
                $customer_id = Session::get('customer_id'); 
                $get_amount = $ct->getAmountPrice($customer_id);
                if ($get_amount) {
                    $amount = 0;
                    while ($result = $get_amount->fetch_assoc()) {
                        $price = $result['price'];
                        $amount += $price;
                    }
                }
             ?>
            <p class="success_note" style="font-size: 20px;font-weight: bold;"><center>Tổng giá trị bạn đã mua: <?php 
                $vat = $amount * 0.1;
                $total = $vat + $amount;
                echo $total.' VNĐ';
             ?></center></p>
            <p class="success_note"><center>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể, xem chi tiết đặt hàng tại <a href="orderdetails.php"><b>Bấm vào đây</b></a></center></p>
        </div>
 	</div>
 	
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>
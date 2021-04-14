<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
	  if(isset($_GET['proid'])){
	  	$customer_id = Session::get('customer_id');
     	$proid = $_GET['proid']; 
      	$delwlist = $cs->del_payment($proid);
	  }

 ?>

<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Lịch sử đơn đặt hàng</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li>Đơn hàng</li>
                <li class="active">Các đơn đặt hàng của bạn</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div  class="ection padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
<table class="table" id="table1">
	
	<thead>
		<tr>
								<th  >STT</th>
								
								<th  >Ngày đặt mua</th>
								<th  >Số lượng</th>
								<th  >Tổng tiền thanh toán</th>
								<th>Xử lý</th>
							</tr>
	</thead>
	<tbody>
		<?php
							
							$get_cart_ordered = $cs->show_payment($customer_id);
							if($get_cart_ordered){
								$i=0;
								
								while ($result = $get_cart_ordered->fetch_assoc()) {
								$i++;
							 ?>
							<tr>
								<th><?php echo $i; ?></th>
								<th><?php echo $fm->formatDate($result['date_time'])  ?></th>
								
								<th><?php echo $result['quantity'] ?></th>
								<th><?php echo $result['total'].' VND' ?></th>
								<th><a href="?proid=<?php echo $result['id'] ?>" onclick="return confirm('Are you want to delete???')">Xóa</a></th>
							</tr>
							<?php 							
								}
							}
							 ?>

	</tbody>
</table>
</div>
</div>
</div>
</div>


<?php 
	include 'inc/footer.php';
 ?>
<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
      $('#table1').DataTable();
    });
  </script>
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
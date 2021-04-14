<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 

    if(isset($_GET['proid'])){
    	$customer_id = Session::get('customer_id');
     	$proid = $_GET['proid']; 
      	$delwlist = $product->del_wlist($proid,$customer_id);
 	}
  ?>
  <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Sản phẩm yêu thích</h1>
              <ol class="breadcrumb">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Sản phẩm yêu thích</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section padding_layout_1 Shopping_cart_section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="product-table">
<table class="table" id="table1">
	<thead>
	<tr>
								<th width="10%">STT</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="20%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Xử lý</th>
	
							</tr>
							</thead>
							<tbody>
							<?php 
							$customer_id = Session::get('customer_id');
							$get_wishlist = $product->get_wishlist($customer_id);
							if($get_wishlist){
								$i = 0;
								while ($result = $get_wishlist->fetch_assoc()) {
								$i++;	
								
							 ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img style="width: 100px;" src="admin/upload/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								
								<td>
									<a href="?proid=<?php echo $result['productId'] ?>">Xóa</a> ||
									<a href="details.php?proid=<?php echo $result['productId'] ?>">Mua Ngay</a>
								</td>
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
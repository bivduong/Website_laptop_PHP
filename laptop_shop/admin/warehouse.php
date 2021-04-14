<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/cart.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
    }
 ?>
 <div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lịch sử nhập hàng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Kho hàng</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách Danh sách kho hàng</li>
            </ol>
          </div>
          <div class="row">
          	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="table1">
	  <thead class="thead-light">
                      <tr>
                      <th>ID</th>
					<th>Code</th>
					<th>Tên sản phẩm</th>
				
					<th>Số lượng ban đầu</th>
					<th>Đã bán</th>
				
					<th>Số lượng trước nhập</th>
					<th>Số lượng thêm</th>
					<th>Số lượng sau nhập</th>
					
					<th>Ngày nhập</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
				
				$pdlist = $pd->show_product_warehouse();
				$i = 0;
				
				
					if($pdlist){
					
							while ($result = $pdlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_code'] ?></td>
					<td><?php echo $result['productName'] ?></td>
					
					<td>
						<?php echo $result['productQuantity'] ?>

					</td>
					<td>
						<?php echo $result['product_soldout'] ?>

					</td>
					
					<td>
						<?php echo $result['product_remain'] - $result['sl_nhap'] ?>

					</td>
					<td>
						<?php echo $result['sl_nhap'] ?>

					</td>
					<td>
						<?php echo $result['product_remain'] ?>

					</td>
					<td>
						<?php echo $result['date_time'] ?>

					</td>
					
					
				</tr>
				<?php
							
						
					}
				}
				?>
			</tbody>
                    </tbody>
</table>



			</div>
		</div>
	</div>
          </div>
      </div>



<?php include 'inc/footer.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/management.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new management();
	$fm = new Format();
	
 ?>
 <div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quản lý kho hàng</h1>
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
					<th>Tên sản phẩm</th>
					<th>Mã sản phẩm</th>
				
					
					<th>Đã bán</th>
				
					<th>Số lượng còn</th>
					
                        
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
				
				$pdlist = $pd->show_warehouse();
				$i = 0;
				
				
					if($pdlist){
					
							while ($result = $pdlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['product_code'] ?></td>
					
					
					<td>
						<?php echo $result['product_soldout'] ?>

					</td>
					
					<td>
						<?php echo $result['product_remain']  ?>

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

<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>

<?php include '../classes/management.php';  ?>
<?php include_once '../helpers/format.php';  ?>

<?php
$mn = new management(); 
 $fm = new Format();
?>
 <div class="container-fluid" id="container-wrapper">
 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Thống kê</li>
              <li class="breadcrumb-item active" aria-current="page"> Doanh thu từng tháng</li>
            </ol>
          </div>
              <div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive p-3">
			
        	
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
                      	<th>Tên sản phẩm</th>
                        <th>Số sao trung bình</th>
                        <th>Số bình luận</th>
                        
                       
                        
                      </tr>
                    </thead>
                    <tbody>

				 <?php
			
				$pdlist = $mn->show_product_comment();
				if($pdlist){
					
					while($result = $pdlist->fetch_assoc()){
						
				?>
				<tr class="odd gradeX">
					<td><?php echo $result['productName']?></td>
					<td>
						<p><?php echo $result['trungbinhsao']?></p>
                        
                            
					</td>
					<td><?php echo $result['sbl']?></td>

					
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
 <?php include 'inc/footer.php';?>
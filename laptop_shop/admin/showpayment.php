<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php  include '../classes/customer.php'?>
<?php  include_once '../helpers/format.php'?>
<?php
    $s = new customer();
    // hàm check delete Name khi submit lên
     $fm = new Format();
    
?>
 <div class="container-fluid" id="container-wrapper">
 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lịch sử các đơn đặt hàng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Brand</li>
              <li class="breadcrumb-item active" aria-current="page"> Lịch sử các đơn đặt hàng</li>
            </ol>
          </div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive">
				
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
                      <th>Serial No.</th>
							<th width="20%">Tên Khách hàng</th>
							<th>Địa chỉ</th>
							<th>Email</th>
							<th width="20%;">Số lượng sản phẩm đã mua</th>
							<th >Ngày mua</th>
							<th>Tổng số tiền</th>
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php 
						$show_cat=$s->show_payment_details();
						if($show_cat){
							$i=0;
							while ($result=$show_cat->fetch_assoc()) {
								$i++;
							
						?>
					<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['address']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['sanphamdamua']; ?></td>
							<td><?php echo $result['weekNum']; ?></td>
							<td><?php echo $fm->format_currency($result['tongtien'])." " ."VND"?></td>
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
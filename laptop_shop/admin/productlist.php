<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productId'])){
        $id = $_GET['productId']; 
        $delpro = $pd->del_product($id);
    }

?>
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Sản phẩm</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách Sản phẩm</li>
            </ol>
          </div>
          <div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive p-3">
				  <?php
        if(isset($delpro)){
        	echo $delpro;
        }
        ?>
        	
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>fd</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php
			
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>

					
					<td><a href="quantityofgoods.php?productid=<?php echo $result['productId'] ?>">Nhập hàng</a></td>
				
					<td><?php
echo $fm->format_currency($result['price'])." " ."VND"?></td>
					<td><img src="upload/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['catId'] ?></td>
					<td><?php echo $result['brandId'] ?></td>
					<td><?php 

					echo $fm->textShorten($result['product_desc'], 20);

					 ?></td>
					<td><?php 
						if($result['type']==0){
							echo 'Feathered';
						}else{
							echo 'Non-Feathered';
						}

					?></td>
					<?php if(Session::get('admintk')=='1') { ?>  
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a href="?productId=<?php echo $result['productId'] ?>">Delete</a></td>
				<?php } ?>
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

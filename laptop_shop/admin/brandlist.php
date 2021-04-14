<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    $brand = new brand();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delbrand = $brand -> del_brand($id); // hàm check delete Name khi submit lên
    }
 ?> 
 <div class="container-fluid" id="container-wrapper">
 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách thương hiệu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Brand</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách thương hiệu</li>
            </ol>
          </div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive">
				<?php 
                    if(isset($delbrand)){
                        echo $delbrand;
                    }
                 ?>  
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Thương hiệu</th>
                        <th>Xử lý</th>
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php 
							$show_brand = $brand -> show_brand();
							if($show_brand){
								$i = 0;
								while($result = $show_brand ->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td>
 <?php if(Session::get('admintk')=='1') { ?>
								<a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['brandId'] ?>">Delete</a><?php 
							
						}
						 ?></td>
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


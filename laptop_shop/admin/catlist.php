<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php  include '../classes/category.php'?>
<?php
    $cat = new category();
     if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delCat = $cat -> del_category($id); // hàm check delete Name khi submit lên
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
                    if(isset($delCat)){
                        echo $delCat;
                    }
                 ?>
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
                      <th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php 
						$show_cat=$cat->show_category();
						if($show_cat){
							$i=0;
							while ($result=$show_cat->fetch_assoc()) {
								$i++;
							
						?>
					<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['catName']; ?></td>
							<?php if(Session::get('admintk')=='1') { ?>  
							<td><a href="catedit.php?catid=<?php echo $result['catID']; ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['catID'] ?>">Delete</a></td>
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


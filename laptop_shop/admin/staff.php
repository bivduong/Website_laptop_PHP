<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/management.php';  ?>
<?php
    // gọi class category
    $mn = new management();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delbrand = $mn -> del_admin($id); // hàm check delete Name khi submit lên
    }
 ?> 
 <div class="container-fluid" id="container-wrapper">
 	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách nhân viên</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Nhân viên</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách nhân viên</li>
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
                        <th>Tên nhân viên</th>
                        <th>Thông tin nhân viên</th>
                        <th>Xử lý</th>
                        
                      </tr>
                    </thead>
                    <tbody>
						<?php 
							$show_admin = $mn -> show_admin();
							if($show_admin){
								$i = 0;
								while($result = $show_admin ->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="staffdetails.php?admin_id=<?php echo $result['id'] ?>">Xem thông tin nhân viên</a></td>
							<td>
 
						 <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
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


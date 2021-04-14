<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/product.php';?>
<?php 
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		$del_slider = $product->del_slider($id);

	}
 ?>
  <div class="container-fluid" id="container-wrapper">
  	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách slider banner</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Banner</li>
              <li class="breadcrumb-item active" aria-current="page"> Danh sách slider banner</li>
            </ol>
          </div>
          <div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card">
			<div class="table-responsive">
			 <?php 
        if (isset($del_slider)) {
        	echo $del_slider;
        }
         ?>  
				<table class="table align-items-center table-flush" id="table1">
					  <thead class="thead-light">
                      <tr>
					<th>No.</th>
					<th>Tiêu đề slider</th>
					<th>Slider Image</th>
					<th>Hiển thị</th>
					<th>Xử lý</th>
				</tr>
                    </thead>
                    <tbody>
						<?php
					$product = new product();
					$get_slider = $product->show_slider_list();
					if($get_slider){
						$i = 0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
						?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result_slider['sliderName'] ?></td>
					<td><img src="upload/<?php echo $result_slider['slider_image'] ?>" height="200px" width="500px"/></td>	<?php if(Session::get('admintk')=='1') { ?>  	
					<td>
						<?php
						if($result_slider['type']==1){
						?>
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">Off</a> 
						<?php
						 }else{
						?>	
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">On</a> 
						<?php
						}
						?>

					</td>		
					
				<td>
					
					<a href="?slider_del=<?php echo $result_slider['sliderId'] ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
				</td>
			<?php } ?>
					</tr>
				<?php
				}}
			    ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
  	</div>


<?php include 'inc/footer.php';?>

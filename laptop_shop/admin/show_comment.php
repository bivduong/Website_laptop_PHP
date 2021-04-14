<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/management.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$mn = new management();
	if(isset($_GET['ratingId'])){
        $id = $_GET['ratingId']; 
        $delpro = $mn->del_comment($id);
    }
	

?>
<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Đánh giá</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Xem đánh giá</li>
              <li class="breadcrumb-item active" aria-current="page"> Đánh giá khách hàng</li>
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
                        <th>Tên khách hàng</th>
                        <th>Số sao</th>
                        <th>Sản phẩm</th>
                        <th>tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Action</th>
                        <th>Item</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php
 $show_fee = $mn -> comment_product_full();
              if($show_fee){
               
                while($result = $show_fee ->fetch_assoc()){
                 
                
            ?>
                      <tr>
                        <td><a href="#"><?php echo $result['name']; ?></a></td>
                        <td><?php echo $result['ratingNumber']; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php echo $result['title']; ?></td>
                        <td><?php echo $result['comments']; ?></td>
                        <td><span class="btn btn-warning" 
                       ><a href="?ratingId=<?php echo $result['ratingId'] ?>">Delete</a></span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                       <?php }} ?>
                    </tbody>
                  </table>
                 
			</div>
		</div>
	</div>
</div>
	</div>



<?php include 'inc/footer.php';?>

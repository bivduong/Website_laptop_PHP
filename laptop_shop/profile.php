<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:user.php');
	  }
	   ?>
<?php 
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";
        
 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }

 //    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct -> add_to_cart($id, $quantity); // hàm check catName khi submit lên
 //    } 
 ?>
 <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Profile</h1>
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="section padding_layout_1">
    <div class="container">
    	<div class="row">
    		<div class="product-table">
    		<div class="col-sm-12 col-md-12">
    		<h3>Profile Customer</h3>
    		
    	<table class="table">
    		<?php 
    		$id = Session::get('customer_id');
    		$get_customers = $cs->show_customers($id);
    		if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
    			
    		 ?>
    		<tr>
    			<td>Name</td>
    			<td>:</td>
    			<td><?php echo $result['name']; ?></td>
    		</tr>
    		
    		<tr>
    			<td>Phone</td>
    			<td>:</td>
    			<td><?php echo $result['phone']; ?></td>
    		</tr>
    		<tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country']; ?></td>
    		</tr> 
    		
    		<tr>
    			<td>Email</td>
    			<td>:</td>
    			<td><?php echo $result['email']; ?></td>
    		</tr>
    		<tr>
    			<td>Address</td>
    			<td>:</td>
    			<td><?php echo $result['address']; ?></td>
    		</tr>
            <tr>
                <td colspan="3"><a href="editprofile.php"><button class="button">Update</button></a></td>
               
            </tr>
    		
    		<?php 
    		}
    		}
    		 ?>
    	</table>
        </div>
            
        </div>	
    	</div>	
 	</div>
</div>
<?php 
	include 'inc/footer.php';
 ?>
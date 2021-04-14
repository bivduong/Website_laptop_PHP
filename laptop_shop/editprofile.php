<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
	   ?>
<?php 
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";
        
 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $UpdateCustomers = $cs -> update_customers($_POST, $id); // hàm check catName khi submit lên
    } 
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
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">Chỉnh sửa thông tin</li>
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
            <h3 class="text-center">Thông tin khách hàng</h3>
           <form action="" method="post"> 
        <table class="table">
           <tr>
                <?php 
                if (isset($UpdateCustomers)) {
                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                }
                 ?>
            </tr>

            <?php 
            $id = Session::get('customer_id');
            $get_customers = $cs->show_customers($id);
            if ($get_customers) {
                while ($result = $get_customers->fetch_assoc()) {
                
             ?>
            <tr>

                <td>Name</td>
                <td>:</td>

                <td><input type="text" name="name" value="<?php echo $result['name'];  ?>" class="form-control" style="width:30%;"></td>

            </tr>
          
            <tr>
                <td>Phone</td>
                <td>:</td>
                <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>" class="form-control" style="width:30%;"></td>
                
            </tr>
             <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $result['country']; ?></td>
            </tr> 
            
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" value="<?php echo $result['email']; ?>" class="form-control" style="width:30%;"></td>
                
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td>
<textarea class="form-control" name="address" ><?php echo $result['address']; ?></textarea>
                </td>
                
            </tr>
            <tr>
                <td colspan="3"><button type="submit" name="save"  class="button" >Lưu lại</button></td>
               
            </tr>
            
            <?php 
            }
            }
             ?>
        </table>
    </form>
        </div>
            
        </div>  
        </div>  
    </div>
</div>


<?php 
	include 'inc/footer.php';
 ?>
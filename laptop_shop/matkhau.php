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
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $UpdateCustomers = $cs -> update_pass($_POST, $id); // hàm check catName khi submit lên
    } 
 ?>
 
  <div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Đổi mật khẩu</h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Đổi mật khẩu</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-primary">Đổi mật khẩu</h3>
      <form method="POST" action="">
        <?php 
                if (isset($UpdateCustomers)) {
                    echo $UpdateCustomers;
                }
                 ?>
                 <table class="table">
                   <tr>
                     <td><label for="user_signin">Mật khẩu cũ</label></td>
                     <td>:</td>
                     <td><input  class="form-control" name="old_password" type="password" style="width:50%;"></td>
                   </tr>
                   <tr>
                     <td>
                       <label for="user_signin">Mật khẩu mới</label>
                     </td>
                      <td>:</td>
                     <td><input  class="form-control" name="new_password"  type="password" style="width:50%;"></td>
                   </tr>
                   <tr>
                     <td><label for="user_signin">Nhập lại mật khẩu mới</label></td>
                      <td>:</td>
                     <td><input  class="form-control" name="upda_password" type="password" style="width:50%;"></td>
                   </tr>
                   <tr>
                     <td> <a href="index.php" class="button">
            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
          </a></td>
          
          <td><button class="button " id="submit_change_pass" name="submit">
            <span class="glyphicon glyphicon-ok"></span> Thay đổi
          </button></td>
                   </tr>
                 </table>
       
          
          
          
      </form>
    </div>
  </div>
</div>
<?php 
  include 'inc/footer.php';
 ?>

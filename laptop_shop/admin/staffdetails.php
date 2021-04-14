<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/management.php';  ?>

<?php
    // gọi class category
    $pd = new management();
    if(!isset($_GET['admin_id']) || $_GET['admin_id'] == NULL){
        echo "<script> window.location = 'staff.php' </script>";
        
    }else {
        $id = $_GET['admin_id']; // Lấy productid trên host
    } 
    
  ?>


 <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin chi tiết nhân viên</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Nhân viên</li>
              <li class="breadcrumb-item active" aria-current="page">Thông tin chi tiết nhân viên</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="table-responsive p-3">
            	<?php 
            if(isset($updatemoreProduct)){
                echo $updatemoreProduct;
            }
         ?>
         <?php 
         $get_product_by_id = $pd->show_admin_details($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                # code...
            
          ?>   
        
<table class="table align-items-center table-flush" id="table1">
     <tr>
                    <td>
                        <label>Tên nhân viên</label>
                    </td>
                    <td>
                        <input readonly value="<?php echo $result_product['name'] ?>" type="text" class="form-control" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input readonly  value="<?php echo $result_product['email'] ?>" type="text" class="form-control" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input  readonly  value="<?php echo $result_product['phone'] ?>" type="text" class="form-control" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Địa chỉ</label>
                    </td>
                    <td>
                        <input  readonly  value="<?php echo $result_product['address'] ?>" type="text" class="form-control" />
                    </td>
                </tr>  
                  <tr>
                    <td>
                        <label>Tên tài khoản</label>
                    </td>
                    <td>
                        <input  readonly  value="<?php echo $result_product['user'] ?>" type="text" class="form-control" />
                    </td>
                </tr> 
                  <tr>
                    <td>
                        <label>Mật khẩu</label>
                    </td>
                    <td>
                        <input  readonly  value="<?php echo($result_product['password']) ?>" type="password" class="form-control" />
                    </td>
                </tr> 

              
                <tr>
                    <td><a href="staffpass.php?admin_id=<?php echo $result_product['id'] ?>"  class="btn btn-primary">Đổi mật khẩu nếu nhân viên quên</a></td>
                    <td>
                        <a href="staff.php" class="btn btn-primary">Quay lại danh sách nhân viên</a>
                    </td>
                </tr>
</table>

 <?php 
            }
            }
             ?>

            </div>
        </div>
    </div>
          </div>
      </div>



<?php include 'inc/footer.php';?>
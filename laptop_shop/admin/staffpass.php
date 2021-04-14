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
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateadmin= $pd->update_admin_pass($_POST, $id);
        
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
            if(isset( $updateadmin)){
                echo  $updateadmin;
            }
         ?>
         
     <form action="" method="post">   
<table class="table align-items-center table-flush" id="table1">
     <tr>
                    <td>
                        <label>Nhập mật khẩu cần đổi</label>
                    </td>
                    <td>
                        <input name="changepass" type="text" class="form-control" />
                    </td>
                </tr>
              
                <tr>
                    <td>
                        <button class="btn btn-primary" name="submit"> Đổi mật khẩu</button>
                    </td>
                </tr>
</table>

</form>
            </div>
        </div>
    </div>
          </div>
      </div>



<?php include 'inc/footer.php';?>
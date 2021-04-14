<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> window.location = 'inbox.php' </script>";
        
    }else {
        $id = $_GET['customerid']; // Lấy catid trên host
    }
    
    
    
  ?>


<div class="container-fluid" id="container-wrapper">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin khách hàng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active" aria-current="page"> Thông tin khách hàng</li>
            </ol>
          </div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="table-responsive">
                 <?php 
                    $get_customer = $cs->show_customers($id);
                    if($get_customer){
                        while ($result = $get_customer->fetch_assoc()) {
                            
                        
                  ?>
                  <form action="" method="post">
                <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                      <tr>
                      <th></th>
                      <th>
                            <th>Thông tin</th>
                            
                        
                      </tr>
                    </thead>
                    <tbody>
                       
                   <tr>
                            <td>Tên khách hàng</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name']; ?>" name="catName" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>" name="catName" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country']; ?>" name="catName" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['address']; ?>" name="catName" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email']; ?>" name="catName" class="form-control" />
                            </td>
                        </tr>
                        
                        <?php
                        }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
    </div>
</div>


    </div>



        
<?php include 'inc/footer.php';?>
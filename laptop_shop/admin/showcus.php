<?php
include 'inc/header.php';
include 'inc/headertop.php';
?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/management.php');
    include_once ($filepath.'/../helpers/format.php');
    $mn=new management();
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
                 
                  <form action="" method="post">
                <table class="table align-items-center table-flush" id="table1">
                      <thead class="thead-light">
                      <tr>
                      
                      <th>STT</th>
                            <th>Tên </th>
                            <th>Số điện thoai</th>
                            <th  >Địa chỉ</th>
                            
                           
                             <th >Thành phố</th>
                            
                            
                        
                      </tr>
                    </thead>
                    <?php 
                    $show_customer = $mn->show_customer();
                    $i=0;
                    if($show_customer){
                        while ($result = $show_customer->fetch_assoc()) {
                        	$i++;
                            
                        
                  ?>
                    <tbody>
                       
                   <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name']; ?>" name="catName" class="form-control" />

                            </td>
                            <td >
                                <input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>" name="catName" class="form-control" />

                            </td>
                            <td >
                                
                                <textarea style="width: 300px;"  class="form-control" readonly="readonly"><?php echo $result['address']; ?></textarea >
                            </td>
                            

                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country']; ?>" name="catName" class="form-control" />
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
<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updatemoreProduct = $pd->update_quantity_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>


 <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cập nhập số lượng hàng trong kho</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Kho hàng</li>
              <li class="breadcrumb-item active" aria-current="page">Cập nhập số lượng hàng trong kho</li>
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
         $get_product_by_id = $pd->getproductbyId($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {
                # code...
            
          ?>   
          <form action="" method="post" enctype="multipart/form-data">
<table class="table align-items-center table-flush" id="table1">
     <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input readonly name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="form-control" />
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Mã Hàng</label>
                    </td>
                    <td>
                        <input readonly name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="form-control" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Số lượng tồn</label>
                    </td>
                    <td>
                        <input  readonly name="product_remain" value="<?php echo $result_product['product_remain'] ?>" type="text" class="form-control" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Số lượng nhập thêm</label>
                    </td>
                    <td>
                        <input name="product_more_quantity" type="text" placeholder="Nhập thêm số lượng" class="form-control" />
                    </td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Thêm" class="btn btn-primary" />
                    </td>
                </tr>
</table>
</form>
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
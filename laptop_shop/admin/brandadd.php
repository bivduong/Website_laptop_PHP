<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>

<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    $brand = new brand(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $brand -> insert_brand($brandName); // hàm check catName khi submit lên
    }
  ?> 
   <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm thương hiệu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Brand</li>
              <li class="breadcrumb-item active" aria-current="page">Thêm thương hiệu</li>
            </ol>
          </div>
        <div class="row" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <div class="card-body" >
                    

                
                <?php 
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                 ?>
                 <form action="brandadd.php" method="post">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" name="brandName"
                        placeholder="Vui lòng nhập tên thương hiệu" >
                      

                    </div>
                    <div class="text-center">
                    <button type="submit" name="submit" Value="Save" class="btn btn-primary ">Submit</button>
                    </div>
                    </form>
                
            </div>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?>
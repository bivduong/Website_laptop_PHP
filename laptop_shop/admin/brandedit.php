<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>

<?php include '../classes/brand.php';  ?>
<?php
    $brand = new brand(); 
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
        echo "<script> window.location = 'brandlist.php' </script>";
        
    }else {
        $id = $_GET['brandid']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $updateBrand = $brand -> update_brand($brandName,$id); // hàm check catName khi submit lên
        
    }
     
if(isset($_SESSION['brandid']))
{
     $_SESSION['brandid'] += 1;
     echo '<p>gff</p>'.$_SESSION['brandid'];
}

  ?>
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sửa thương hiệu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Brand</li>
              <li class="breadcrumb-item active" aria-current="page">Sửa thương hiệu</li>
            </ol>
          </div>
        <div class="row" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <div class="card-body" >
                    

                
                <?php 
                    if(isset($updateBrand)){
                        echo $updateBrand;
                    }
                 ?>
                 <?php 
                    $get_brand_name = $brand->getbrandbyId($id);
                    if($get_brand_name){
                        while ($result = $get_brand_name->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" name="brandName"
                        placeholder="Vui lòng nhập tên thương hiệu"  value="<?php echo $result['brandName']; ?>" name="brandName">
                      

                    </div>
                    <div class="text-center">
                    <button type="submit" name="submit" Value="Edit" class="btn btn-primary ">Edit</button>
                    </div>
                    </form>
                     <?php 
                        }
                    }

                     ?>
                
            </div>
            </div>
        </div>
    </div>
        
<?php include 'inc/footer.php';?>
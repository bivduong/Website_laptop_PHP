<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>

<?php include '../classes/category.php';  ?>
<?php
    $cat = new category(); 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['catid']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
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
                    if(isset($updateCat)){
                        echo $updateCat;
                    }
                 ?>
                 <?php 
                    $get_cat_name = $cat->getcatbyId($id);
                    if($get_cat_name){
                        while ($result = $get_cat_name->fetch_assoc()) {
                            
                        
                  ?>
                 <form action="" method="post">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" type="text" value="<?php echo $result['catName']; ?>" name="catName" placeholder="Sửa danh mục sản phẩm...">
                      

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
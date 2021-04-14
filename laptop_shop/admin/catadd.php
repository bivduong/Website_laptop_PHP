<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php  include '../classes/category.php'?>
<?php
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catname = $_POST['catname'];
        

        $insertcat = $cat->insert_category($catname);
        
    }
?>
<?php?>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm loại sản phẩm</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Category</li>
              <li class="breadcrumb-item active" aria-current="page">Thêm loại sản phẩm</li>
            </ol>
          </div>
        <div class="row" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            <div class="card-body" >
                    

                
                 <?php 
if(isset($insertcat))
    {echo $insertcat;}
                ?>
                 <form action="catadd.php" method="post">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" name="catname"
                        placeholder="Vui lòng nhập tên loại sản phẩm" >
                      

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
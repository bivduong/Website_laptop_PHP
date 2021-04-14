<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd = new product();

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
       echo "<script>window.location ='productlist.php'</script>";
    }else{
         $id = $_GET['productid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_product($_POST,$_FILES, $id);
        
    }
?>

<div class="container-fluid" id="container-wrapper">
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Sản Phẩm</li>
              <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa sản phẩm</li>
            </ol>
          </div>
          <div class="row">
              <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="table-responsive">
                        <?php

                if(isset($updateProduct)){
                    echo $updateProduct;
                }

            ?>        
        <?php
         $get_product_by_id = $pd->getproductbyId($id);
            if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){
        ?>     
                        <form action="" method="post" enctype="multipart/form-data">
                            <table class="table align-items-center table-flush">
                                <tbody>
                                    <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text"  name="productName" value="<?php echo  $result_product['productName']?>" class="form-control" />
                    </td>
                </tr>
                     <tr>
                    <td>
                        <label>Code</label>
                    </td>
                    <td>
                        <input name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input name="productQuantity" value="<?php echo $result_product['productQuantity'] ?>" type="text" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category" style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option>--------Select Category--------</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){

                             ?>
                              
                             



                            <option
                            <?php
                            if($result['catID']==$result_product['catId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>



                               <?php
                                  }
                              }
                           ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand" style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option>--------Select Brand-------</option>

                             <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option

                            <?php
                            if($result['brandId']==$result_product['brandId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce" id="mydesc"><?php echo $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_product['price'] ?>" name="price" class="form-control" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image'] ?>" width="90"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
                      <tr>
                    <td>
                        <label>Upload Image 1</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image1'] ?>" width="90"><br>
                        <input type="file" name="image1" />
                    </td>
                </tr>
                      <tr>
                    <td>
                        <label>Upload Image 2</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image2'] ?>" width="90"><br>
                        <input type="file" name="image2" />
                    </td>
                </tr>
                      <tr>
                    <td>
                        <label>Upload Image 3</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image3'] ?>" width="90"><br>
                        <input type="file" name="image3" />
                    </td>
                </tr>
                
                
                
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type" style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option>Select Type</option>
                            <?php
                            if($result_product['type']==0){
                            ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php
                        }else{
                            ?>
                            <option value="0">Featured</option>
                            <option selected value="1">Non-Featured</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        
                        <button type="submit" name="submit" Value="Update" class="btn btn-primary ">Update</button>
                    </td>
                </tr>
                                </tbody>
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


<script src="js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
<script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>

<script type="text/javascript">
   
    tinymce.init({
        selector:"#mydesc"
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



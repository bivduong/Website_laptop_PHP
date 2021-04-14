<?php include 'inc/header.php';?>
<?php include 'inc/headertop.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Sản Phẩm</li>
              <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
            </ol>
          </div>

          <div class="row">
              <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="table-responsive">
                          <?php 
            if(isset($insertProduct)){
                echo $insertProduct;
            }
         ?>   
                        <form action="productadd.php" method="post" enctype="multipart/form-data">
                        <table class="table align-items-center table-flush">
                            <tbody>
                                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Nhập tên sản phẩm..." class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Code sản phẩm</label>
                    </td>
                    <td>
                        <input name="product_code" type="text" placeholder="Nhập code sản phẩm..." class="form-control" />
                    </td>
                </tr>
              
                  <tr>
                    <td>
                        <label>Số lượng sản phẩm</label>
                    </td>
                    <td>
                        <input name="productQuantity" type="text" placeholder="Nhập số lượng sản phẩm..." class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Danh mục sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="category"  style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option >Chọn chuyên mục</option>
                            <?php 
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['catID'] ?> "> <?php echo $result['catName'] ?> </option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand" style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option>Chọn thương hiệu</option>
                            <?php 
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea style="width: 130%" name="product_desc" class="tinymce" id="mydesc"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Nhập giá..." class="form-control" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh chính</label>
                    </td>
                    <td>
                        <input name="image" type="file" / class="form-control">
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Tải ảnh phụ 1</label>
                    </td>
                    <td>
                        <input name="image1" type="file" / class="form-control">
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Tải ảnh phụ 2</label>
                    </td>
                    <td>
                        <input name="image2" type="file" / class="form-control">
                    </td>
                </tr>
                  <tr>
                    <td>
                        <label>Tải ảnh phụ 3</label>
                    </td>
                    <td>
                        <input name="image3" type="file" / class="form-control">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Loại sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type" style=" height: 7vh;border-radius: 5px;border:1px solid #6777ef;">
                            <option>Chọn</option>
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                       
                    <button type="submit" name="submit"  class="btn btn-primary ">Submit</button>
                    
                        
                    </td>
                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                      
                  </div>
              </div>
          </div>
      </div>

<!-- Load TinyMCE -->
<script src="js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
<script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>

<script type="text/javascript">
   
    tinymce.init({
        selector:"#mydesc"
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>

